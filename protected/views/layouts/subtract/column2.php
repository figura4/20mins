<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/subtract/main'); ?>
	<div class="container">
		<!-- Main Content
		================================================== -->
		<?php echo $content; ?>
		
		<!-- Sidebar
		================================================== -->
		<?php $this->renderPartial('//layouts/subtract/_sidebar'); ?>
		<div class="bottom"></div>
	</div>
<?php $this->endContent(); ?>