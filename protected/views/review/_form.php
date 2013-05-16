<?php
/* @var $this ReviewController */
/* @var $model Review */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_title'); ?>
		<?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'page_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->textField($model,'cover',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'cover'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture1'); ?>
		<?php echo $form->textField($model,'picture1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'picture1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture2'); ?>
		<?php echo $form->textField($model,'picture2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'picture2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture3'); ?>
		<?php echo $form->textField($model,'picture3',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'picture3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'italian_title'); ?>
		<?php echo $form->textField($model,'italian_title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'italian_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'italian_subtitle'); ?>
		<?php echo $form->textField($model,'italian_subtitle',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'italian_subtitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'original_title'); ?>
		<?php echo $form->textField($model,'original_title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'original_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'original_subtitle'); ?>
		<?php echo $form->textField($model,'original_subtitle',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'original_subtitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vote'); ?>
		<?php echo $form->textField($model,'vote'); ?>
		<?php echo $form->error($model,'vote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->textField($model,'author_id'); ?>
		<?php echo $form->error($model,'author_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actors'); ?>
		<?php echo $form->textArea($model,'actors',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'actors'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nation'); ?>
		<?php echo $form->textField($model,'nation',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pages'); ?>
		<?php echo $form->textField($model,'pages',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'pages'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'editor'); ?>
		<?php echo $form->textField($model,'editor',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'editor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seasons'); ?>
		<?php echo $form->textField($model,'seasons',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'seasons'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pub_date'); ?>
		<?php echo $form->textField($model,'pub_date'); ?>
		<?php echo $form->error($model,'pub_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_on'); ?>
		<?php echo $form->textField($model,'created_on'); ?>
		<?php echo $form->error($model,'created_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_on'); ?>
		<?php echo $form->textField($model,'updated_on'); ?>
		<?php echo $form->error($model,'updated_on'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->