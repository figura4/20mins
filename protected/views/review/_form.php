<?php
/* @var $this ReviewController */
/* @var $model Review */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', array('book' => 'Book', 'movie' => 'Movie', 'tv' => 'Tv show'), array('empty'=>'- select review type')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->dropDownList($model,'author_id', CHtml::listData(Author::model()->findAll(array('order'=>'last_name')), 'id', 'full_name'), array('empty'=>'- select author')); ?>
		<?php echo $form->error($model,'author_id'); ?>
		<?php echo CHtml::link('New author', $this->createUrl('/author/create'), array('target'=>'_blank')); ?>
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
		<?php echo $form->checkBox($model, 'published', array('checked'=>'checked')); ?>
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
		<?php echo $form->labelEx($model,'vote'); ?>
		<?php echo $form->dropDownList($model,'vote', array(
														'10' => '10 - Capolavoro!', 
														'9'  => '9 - Eccellente',
														'8'  => '8 - Ottimo',
														'7'  => '7 - Buono',
														'6'  => '6 - Discreto',
														'5'  => '5 - Mediocre',
														'4'  => '4 - Scarso',
														'3'  => '3 - Pessimo',
														'2'  => '2 - Orribile',
														'1'  => '1 - Una chiavica',
														'0'  => '0 - Criminale',
				), array('empty'=>'- pick a vote')); ?>
		<?php echo $form->error($model,'vote'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->fileField($model,'cover'); ?>
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
	
	<h3>Book review fields</h3>
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
	
	<h3>Movie/Tv review fields</h3>
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
		<?php echo $form->labelEx($model,'seasons'); ?>
		<?php echo $form->textField($model,'seasons',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'seasons'); ?>
	</div>
	
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