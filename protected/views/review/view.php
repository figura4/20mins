			<?php
			$this->setPageTitle($model->page_title.' - '.Yii::app()->name); 
			$this->title=Ucfirst($model->page_title);
			$this->subtitle= $model->author->getFullName(false);
			if(!(is_null($model->editor) or ($model->editor=='')))
				$this->subtitle.=" - $model->editor";
			if(!(is_null($model->year) or ($model->year=='')))
				$this->subtitle.=" ($model->year)";
			if(!(is_null($model->pages) or ($model->pages=='')))
				$this->subtitle.=", $model->pages pagine";
			//$this->subtitle.=' '.$model->getHtmlVote();
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
												$tagsarray[] = CHtml::link(ucfirst($tag->name), Yii::app()->createUrl('tag/view', array('id' => $tag->id, 'tag'=>$tag->name))); 
											}
											$tagsHtml = implode(', ', $tagsarray);
											echo $tagsHtml;
										?>
									</span>
								</li>
								<li><i class="icon-heart"></i> Voto: <span><a href="javascript:void(0)"><?php echo $model->getHtmlVote(); ?></a></span></li>
							</ul>
						</div>
						<h3>La recensione</h3>
						<?php echo $model->body; //@TODO tinymce inserts spans into paragraphs! ?>
						<?php if(count($model->quote)>0) {?>
							<h3>Quotes</h3>
							<?php foreach($model->quote as $quote) { ?>
								<blockquote>
									<?php echo $quote->body; ?>
								</blockquote>
							<?php } ?>
						<?php } ?>
						<div class="author-info">
							<h5>L'autore / <?php echo $model->author->getFullName(false); ?></h5>
							<img src="<?php echo $model->author->getPictureUrl(); ?>" class="tool" alt="<?php echo $model->author->getFullName(false); ?>" title="Si, questo &egrave; <?php echo $model->author->getFullName(false); ?>" />
							<?php echo $model->author->bio; ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				
				<!--Comments section-->
				<?php echo $this->renderPartial('../partials/_comments', array('model'=>$model, 'comment'=>$comment)); ?>

			</div>
