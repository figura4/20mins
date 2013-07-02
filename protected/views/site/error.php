<?php
$this->setPageTitle('Errore - '.Yii::app()->name);
$this->title='Errore';
$this->subtitle= 'Si &egrave; verificato un errore';
?>
<div class="eleven columns">
	<h2>Errore <?php echo $code; ?></h2>
	<div class="error">
	<?php echo CHtml::encode($message); ?>
	</div>
</div>