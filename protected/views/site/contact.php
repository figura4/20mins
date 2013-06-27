	<?php
	$this->setPageTitle(Yii::app()->name . ' - Contatti'); 
	$this->title='Contatti';
	$this->subtitle='Contatta lo staff';
	?>
	
	<div class="eleven columns">
		<?php /** @TODO: FIX contact form */?>
		<?php if(Yii::app()->user->hasFlash('contact')): ?>
		
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('contact'); ?>
		</div>
		
		<?php else: ?>
		
		<div class="form">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
		
			<?php echo $form->errorSummary($model); ?>
		
			<div class="row">
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name'); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email'); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($model,'body'); ?>
				<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'body'); ?>
			</div>
		
			<?php if(CCaptcha::checkRequirements()): ?>
			<div class="row">
				<?php echo $form->labelEx($model,'verifyCode'); ?>
				<div>
				<?php $this->widget('CCaptcha'); ?>
				<?php echo $form->textField($model,'verifyCode'); ?>
				</div>
				<div class="hint">Please enter the letters as they are shown in the image above.
				<br/>Letters are not case-sensitive.</div>
				<?php echo $form->error($model,'verifyCode'); ?>
			</div>
			<?php endif; ?>
		
			<div class="row buttons">
				<?php echo CHtml::submitButton('Submit'); ?>
			</div>
		
		<?php $this->endWidget(); ?>
		
		</div><!-- form -->
		
		<?php endif; ?>
	</div>