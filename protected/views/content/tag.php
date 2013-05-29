<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Tag',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
	array('label'=>'View Content', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

<h1>Tags for "<?php echo $model->page_title; ?>"</h1>

<?php echo $this->renderPartial('_tagsForm', array('model'=>$model)); ?>