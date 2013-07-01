			<?php
			$this->setPageTitle($model->page_title.' - '.Yii::app()->name); 
			$this->title=$model->page_title;
			$this->subtitle='A Blog post';
			?>
			
			<div class="eleven columns">
				<div class="blog-post">
					<div class="date">
						<span class="month"><?php echo strtoupper(date('M', strtotime($model->pub_date))); ?></span>
						<span class="day-year"><?php echo date('jS', strtotime($model->pub_date)) . ', ' . date('Y', strtotime($model->pub_date)); ?></span>
					</div>
					<div class="post">
						<div class="image-container">
							<img src="<?php echo $model->getCoverUrl(); ?>" alt="" />
							<div class="blog-read-more"></div>
						</div>
						<div class="meta">
							<ul>
								<li><i class="icon-pencil"></i> Autore: <span><a href="javascript:void(0)">Figura4</a></span></li>
								<li><i class="icon-tasks"></i> Categoria: <span><a href="javascript:void(0)"><?php echo $model->getCategory(); ?></a></span></li>
								<li><i class="icon-tag"></i> Tags: 
									<span>
										<?php 
											$tagsarray = array();
											foreach ($model->categories as $tag) {
												$tagsarray[] = CHtml::link(ucfirst($tag->name), Yii::app()->createUrl('review/list', array('tagId' => $tag->id, 'tag'=>$tag->urlifyTagName()))); 
											}
											$tagsHtml = implode(', ', $tagsarray);
											echo $tagsHtml;
										?>
									</span>
								</li>
								<li><i class="icon-comments"></i> Commenti: <span><a href="javascript:void(0)"><?php echo count($model->comments); ?></a></span></li>
							</ul>
						</div>
						<h3><?php echo $model->page_title; ?></h3>
						<?php echo $model->body;?>
					</div>
					<div class="clearfix"></div>
				</div>
				
				<!--Comments section-->
				<?php echo $this->renderPartial('../partials/_comments', array('model'=>$model, 'comment'=>$comment)); ?>

			</div>