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
		'author_id',
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
