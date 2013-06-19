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
									<div class="date">at 7:30pm on December 23rd, 2012</div>
									<a href="#" class="button right">Reply</a>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
				<!-- End Comments -->
				
				<!-- Form -->
				<div class="comment-form">
					<h5>Leave a Comment</h5>
					<form action="#">
						<div class="input-box">
							<label for="name">Name</label>
							<input type="text" name="name" value="" id="name" required/>
						</div>
						<div class="input-box">
							<label for="email">Email</label>
							<input type="email" name="email" value="" id="email" required/>
						</div>
						<div class="input-box">
							<label for="email">URL</label>
							<input type="text" name="url" value="" id="url"/>
						</div>
						<div class="clearfix"></div>
						<div class="input-box area">
							<label for="comment">Comment</label>
							<textarea name="comment" rows="12" required></textarea>
						</div>
						<div class="clearfix"></div>
						<input type="submit" class="button" value="Send" />
					</form>
				</div>
				<!-- End Form -->
			</div>










<!-- 
<?php

/* @var $this ContentController */
/* @var $model Content */



$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
	array('label'=>'Update Content', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Content', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

<h1>View Content #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'page_title',
		'user_id',
		'published',
		'type',
		'body',
		'pub_date',
		'created_on',
		'updated_on',
	),
)); ?>
 -->