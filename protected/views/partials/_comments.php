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