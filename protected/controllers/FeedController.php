<?php

class FeedController extends Controller
{
	public function actionRss()
	{
		$feed = new EFeed();

		// general feed settings
		$feed->title= '20mins.it - feed delle recensioni';
		$feed->description = 'Feed delle recensioni di 20mins.it';
		
		//$feed->setImage('Testing RSS 2.0 EFeed class','http://20mins.it/rss',
		//		'http://www.yiiframework.com/forum/uploads/profile/photo-7106.jpg');
		
		$feed->addChannelTag('language', 'it-it');
		$feed->addChannelTag('pubDate', date(DATE_RSS, time()));
		$feed->addChannelTag('link', 'http://20mins.it/rss' );
		$feed->addChannelTag('atom:link','http://20mins.it/rss');
		
		// adding feed items
		$contents = Content::model()->findAll(array('condition'=>'published=1 and pub_date<=NOW()', 'order'=>'pub_date DESC', 'limit'=>'5'));
		
		foreach($contents as $content) {
			$item = $feed->createNewItem();
			$item->title = $content->page_title;
			$item->link = Yii::app()->getBaseUrl(true).Yii::app()->createUrl(($content->type == 'content') ? 'content/view' : 'review/view', array('id' => $content->id, 'title'=>$content->urlifyTitle()));
			$item->date = time();
			$item->description = CHtml::image('/20mins/images/covers/'.$content->cover, $content->page_title) . $content->getTeaser(200);
			$item->addTag('author', 'staff@20mins.it (Oscar Riva)');
			$item->addTag('guid', Yii::app()->getBaseUrl(true).Yii::app()->createUrl(($content->type == 'content') ? 'content/view' : 'review/view', array('id' => $content->id, 'title'=>$content->urlifyTitle())));
			
			$feed->addItem($item);
		}

		$this->render('rss',array(
			'feed'=>$feed,
		));
	}

	public function actionSitemap()
	{
		$this->render('sitemap');
	}
}