<?php
$this->setPageTitle('Error');
$this->subtitle= 'An error has occurred';
?>
<div class="eleven columns">
	<h2>Error <?php echo $code; ?></h2>
	
	<div class="error">
	<?php echo CHtml::encode($message); ?>
	</div>
</div>