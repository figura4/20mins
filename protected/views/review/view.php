<?php
/* @var $this ReviewController */
/* @var $model Review */

$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Review', 'url'=>array('index')),
	array('label'=>'Create Review', 'url'=>array('create')),
	array('label'=>'Update Review', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Review', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Review', 'url'=>array('admin')),
);
?>

<h1>View Review #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'page_title',
		'user_id',
		'published',
		'type',
		'body',
		'cover',
		'picture1',
		'picture2',
		'picture3',
		'italian_title',
		'italian_subtitle',
		'original_title',
		'original_subtitle',
		'year',
		'vote',
		'author.last_name',
		'author.first_name',
		'actors',
		'nation',
		'pages',
		'editor',
		'language',
		'seasons',
		'pub_date',
		'created_on',
		'updated_on',
	),
)); ?>
