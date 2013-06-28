			<?php
			$this->setPageTitle($this->title.' - '.Yii::app()->name); 
			$this->subtitle='Elenco di post';
			?>
			
			<div class="eleven columns">
				<?php foreach ($contents as $content) { ?>
				<div class="blog-post">
					<div class="date">
						<span class="month"><?php echo strtoupper(date('M', strtotime($content->pub_date))); ?></span>
						<span class="day-year"><?php echo date('jS', strtotime($content->pub_date)) . ', ' . date('Y', strtotime($content->pub_date)); ?></span>
					</div>
					<div class="post">
						<div class="image-container">
							<img src="<?php echo $content->getCoverUrl(); ?>" alt="" />
							<div class="blog-read-more"></div>
						</div>
						<div class="meta">
								<ul>
									<li><i class="icon-tasks"></i> Categoria: <span><a href="javascript:void(0)"><?php echo $content->getCategory(); ?></a></span></li>
									<li><i class="icon-tag"></i> Tags: 
										<span>
											<?php 
												$tagsarray = array();
												foreach ($content->categories as $tag) {
													$tagsarray[] = CHtml::link(ucfirst($tag->name), Yii::app()->createUrl('tag/view', array('id' => $tag->id, 'tag'=>$tag->name))); 
												}
												$tagsHtml = implode(', ', $tagsarray);
												echo $tagsHtml;
											?>
										</span>
									</li>
									<li><i class="icon-comments"></i> Commenti: <span><a href="javascript:void(0)"><?php echo count($content->comments); ?></a></span></li>
								</ul>
						</div>
						<h3><?php echo CHtml::link($content->page_title, Yii::app()->createUrl(($content->type == 'content') ? 'content/view' : 'review/view', array('id' => $content->id, 'title'=>$content->urlifyTitle()))); ?></h3>
						<?php echo $content->getTeaser(200); ?>
						<?php echo CHtml::link('Leggi tutto', Yii::app()->createUrl(($content->type == 'content') ? 'content/view' : 'review/view', array('id' => $content->id, 'title'=>$content->urlifyTitle())), array('class'=>'button')); ?>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php } ?>
				
				<?php // display pagination ?>
				<?php $this->widget('CustomPager', array(
						'pages' => $pages,
						'currentPage'=>$pages->getCurrentPage(),
						'itemCount'=>$pages->itemCount,
						'id'=>'pagination',
						'hiddenPageCssClass'=>'disabled_pagination',
						'selectedPageCssClass'=>'active_link',
						'nextPageLabel'=>'&gt;&gt;',
						'prevPageLabel'=>'&lt;&lt;',
						'pageSize'=>Yii::app()->params['pageSize'],
				)) ?>
			</div>