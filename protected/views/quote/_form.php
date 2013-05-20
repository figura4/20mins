<?php
/* @var $this QuoteController */
/* @var $model Quote */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quote-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model,'source',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content_id'); ?>
		<?php echo $form->dropDownList($model,'content_id', CHtml::listData(Review::model()->findAll(array('order' => 'original_title')), 'id', 'original_title'), array('empty'=>'- select review')); ?>
		<?php echo $form->error($model,'content_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'random'); ?>
		<?php echo $form->checkBox($model, 'random', array('checked'=>'checked')); ?>
		<?php echo $form->error($model,'random'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->