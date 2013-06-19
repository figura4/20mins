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
				<div class="comment-form">
					<h5>Lascia un Commento</h5>
					<form id="comment-form" action="/20mins/comment/create" method="post">
						<div id="comment-form_es_" class="errorSummary" style="display:none"><p>Please fix the following input errors:</p>
						<ul><li>dummy</li></ul></div>
						<div class="input-box">
							<label for="Comment_author" class="required">Nome <span class="required">*</span></label>		
							<input size="50" maxlength="50" name="Comment[author]" id="Comment_author" type="text" />
							<div class="errorMessage" id="Comment_author_em_" style="display:none"></div>
						</div>
						<div class="input-box">
							<label for="Comment_email" class="required">Email <span class="required">*</span></label>
							<input size="60" maxlength="80" name="Comment[email]" id="Comment_email" type="text" />	
							<div class="errorMessage" id="Comment_email_em_" style="display:none"></div>
						</div>
						<div class="clearfix"></div>
						<div class="input-box area">
							<label for="Comment_body" class="required">Commento <span class="required">*</span></label>		
							<textarea rows="6" cols="50" name="Comment[body]" id="Comment_body"></textarea>		
							<div class="errorMessage" id="Comment_body_em_" style="display:none"></div>
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