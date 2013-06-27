<?php

class FeedController extends Controller
{
	public function actionRss()
	{
		$feed = new EFeed();

		// general feed settings
		$feed->title= Yii::app()->name.' - feed delle recensioni';
		$feed->description = 'Feed delle recensioni di '.Yii::app()-name;
		
		//$feed->setImage('Testing RSS 2.0 EFeed class','http://20mins.it/rss',
		//		'http://www.yiiframework.com/forum/uploads/profile/photo-7106.jpg');
		
		$feed->addChannelTag('language', 'it-it');
		$feed->addChannelTag('pubDate', date(DATE_RSS, time()));
		$feed->addChannelTag('link', Yii::app()->createAbsoluteUrl('rss'));
		$feed->addChannelTag('atom:link',Yii::app()->createAbsoluteUrl('rss'));
		
		// adding feed items
		$contents = Content::model()->findAll(array('condition'=>'published=1 and pub_date<=NOW()', 'order'=>'pub_date DESC', 'limit'=>'5'));
		
		foreach($contents as $content) {
			$item = $feed->createNewItem();
			$item->title = $content->page_title;
			$item->link = $content->getUrl(true);
			$item->date = time();
			$item->description = CHtml::image($content->getCoverUrl(), $content->page_title) . $content->getTeaser(200);
			$item->addTag('author', Yii::app()->params['adminEmail'].' ('.Yii::app()->params['author'].')');
			$item->addTag('guid', Yii::app()->createAbsoluteUrl(($content->type == 'content') ? 'content/view' : 'review/view', array('id' => $content->id, 'title'=>$content->urlifyTitle())));
			
			$feed->addItem($item);
		}

		$this->render('rss',array(
			'feed'=>$feed,
		));
	}

	public function getBaseSitePageList()
	{
		return array(
					array(
							'loc'=>Yii::app()->createAbsoluteUrl('/'),
							'frequency'=>'weekly',
							'priority'=>'1',
					),
					array(
							'loc'=>Yii::app()->createAbsoluteUrl('/recensioni/libri'),
							'frequency'=>'weekly',
							'priority'=>'0.8',
					),
					array(
							'loc'=>Yii::app()->createAbsoluteUrl('/recensioni/tv'),
							'frequency'=>'weekly',
							'priority'=>'0.8',
					),
					array(
							'loc'=>Yii::app()->createAbsoluteUrl('/recensioni/film'),
							'frequency'=>'weekly',
							'priority'=>'0.8',
					),
					array(
							'loc'=>Yii::app()->createAbsoluteUrl('/site/page', array('view'=>'about')),
							'frequency'=>'weekly',
							'priority'=>'0.8',
					),
					array(
							'loc'=>Yii::app()->createAbsoluteUrl('/site/page', array('view'=>'privacy')),
							'frequency'=>'weekly',
							'priority'=>'0.3',
					),
				);
	}
	
	public function actions()
	{
		return array(
			'sitemap'=>array(
				'class'=>'ext.sitemap.ESitemapAction',
					'importListMethod'=>'getBaseSitePageList',
					'classConfig'=>array(
						array('baseModel'=>'Review',
								'route'=>'/review/view',
								'params'=>array('id'=>'id', 'title'=>'urlifyTitle()')
						),
						array('baseModel'=>'Content',
							'route'=>'/content/view',
							'params'=>array('id'=>'id', 'title'=>'page_title')
						),
					),
			),
			'sitemapxml'=>array(
				'class'=>'ext.sitemap.ESitemapXMLAction',
				'classConfig'=>array(
					array('baseModel'=>'Review',
							'route'=>'/review/view',
							'params'=>array('id'=>'id', 'title'=>'urlifiedTitle')
					),
					array('baseModel'=>'Content',
						'route'=>'/content/view',
						'params'=>array('id'=>'id', 'title'=>'page_title')
					),
				),
				//'bypassLogs'=>true, // if using yii debug toolbar enable this line
				'importListMethod'=>'getBaseSitePageList',
			),
		);
	}
}