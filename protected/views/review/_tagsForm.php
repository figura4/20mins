<?php
/* @var $this ContentController */
/* @var $model Content */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php //echo $form->checkBoxList($model, 'tagIds', Chtml::listData(Tag::model()->findAll(array('order'=>'name')),'id','name'));  ?>
		<?php echo CHtml::checkBoxList(
							'Review[categories]',
							array_map(create_function('$o', 'return $o->id;'), $model->categories), 
							Chtml::listData(Tag::model()->findAll(array('order'=>'name')),'id','name')
		); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->