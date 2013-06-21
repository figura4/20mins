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
					</div>
					<div class="clearfix"></div>
				</div>
				
				<!--Comments-->
				<div id="comments">
					<h5><?php echo count($model->comments); ?> Commenti</h5>
					<ul class="comments">
						<?php foreach ($model->comments as $comment) { ?>
							<li class="comment-cont">
								<div class="avatar"><img src="/20mins/images/subtract/avatar.png" alt="" /></div>
								<div class="comment">
									<h6><?php echo $comment->author; ?></h6>
									<p><?php echo $comment->body; ?></p>
									<div class="date">at <?php echo date('G:ma', strtotime($model->created_on)) ?> on <?php echo date('F jS, Y', strtotime($model->created_on)) ?></div>
									<!-- <a href="#" class="button right">Reply</a>  -->
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
				<!-- End Comments -->
				
				<!-- Form -->
				<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
        			<div class="comment-form">
            			<h5><?php echo Yii::app()->user->getFlash('commentSubmitted'); ?></h5>
        			</div>
    			<?php else: ?>
					<?php echo $this->renderPartial('_commentForm', array('comment'=>$comment)); ?>
				<?php endif; ?>
				<!-- End Form -->

			</div>