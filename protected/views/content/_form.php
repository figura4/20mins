<?php
/* @var $this ContentController */
/* @var $model Content */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_title'); ?>
		<?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'page_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'type',array('value'=>'content'));?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php $this->widget('application.extensions.tinymce.ETinyMce', array('model'=>$model, 'attribute'=>'body')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->textField($model,'cover',array('size'=>50,'maxlength'=>50,'readonly'=>'true','disabled'=>'true')); ?>
		<?php echo $form->error($model,'cover'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'uploadedCover'); ?>
		<?php echo $form->fileField($model,'uploadedCover'); ?>
		<?php echo $form->error($model,'uploadedCover'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->checkBox($model, 'published', array('checked'=>'checked')); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'pub_date'); ?>
		<?php echo $form->textField($model,'pub_date', array('value' => date("Y-m-d H:i:s"))); ?>
		<?php echo $form->error($model,'pub_date'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->