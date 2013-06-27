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
												$tagsarray[] = CHtml::link(ucfirst($tag->name), Yii::app()->createUrl('tag/view', array('id' => $tag->id, 'tag'=>$tag->name))); 
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
						<?php if(count($model->quote)>0) {?>
							<h4>Quotes</h4>
							<?php foreach($model->quote as $quote) { ?>
								<blockquote>
									<?php echo $quote->body; ?>
									<?php if (!is_null($quote->source)) { ?>
										<br/>
										<i class="icon-angle-right"></i> <?php echo $quote->source; ?>
									<?php } ?>
								</blockquote>
							<?php } ?>
						<?php } ?>
						<div class="author-info">
							<h5>L'autore / <?php echo $model->author->getFullName(false); ?></h5>
							<img src="/20mins/images/authors/default.png" class="tool" alt="<?php echo $model->author->getFullName(false); ?>" title="Si, questo &egrave; <?php echo $model->author->getFullName(false); ?>" />
							<?php echo $model->author->bio; ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				
				<!--Comments section-->
				<?php echo $this->renderPartial('../partials/_comments', array('model'=>$model, 'comment'=>$comment)); ?>

			</div>
