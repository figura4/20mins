<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="comment-form">
	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'action' => Yii::app()->request->url,
	'enableAjaxValidation'=>true,
)); ?>
	
	<h5>Lascia un Commento</h5>
	
	<p class="note">I campi con <span class="required">*</span> Sono obbligatori.</p>

	<?php //echo $form->errorSummary($comment, array('class'=>'alert error')); ?>

	<div class="input-box">
		<?php echo $form->labelEx($comment,'author'); ?>
		<?php echo $form->textField($comment,'author',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($comment,'author'); ?>
	</div>

	<div class="input-box">
		<?php echo $form->labelEx($comment,'email'); ?>
		<?php echo $form->textField($comment,'email',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($comment,'email'); ?>
	</div>
	
	<div class="clearfix"></div>
	
	<div class="input-box area">
		<?php echo $form->labelEx($comment,'body'); ?>
		<?php echo $form->textArea($comment,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($comment,'body'); ?>
	</div>
	
	<div class="clearfix"></div>
	
	<?php echo CHtml::submitButton('Send', array('class'=>'button')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->