<?php
/* @var $this ReviewController */
/* @var $model Review */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_title'); ?>
		<?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'page_title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', array('book' => 'Book', 'movie' => 'Movie', 'tv' => 'Tv show')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->dropDownList($model,'author_id', CHtml::listData(Author::model()->findAll(array('order'=>'last_name')), 'id', 'full_name'), array('empty'=>'- select Author')); ?>
		<?php echo $form->error($model,'author_id'); ?>
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
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->checkBox($model, 'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pub_date'); ?>
		<?php 
			echo $form->textField($model,'pub_date', array('value' => date("Y-m-d H:i:s"))); 
		?>
		<?php echo $form->error($model,'pub_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'vote'); ?>
		<?php echo $form->textField($model,'vote'); ?>
		<?php echo $form->error($model,'vote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->textField($model,'cover',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'cover'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'language'); ?>
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
		<?php echo $form->labelEx($model,'seasons'); ?>
		<?php echo $form->textField($model,'seasons',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'seasons'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->