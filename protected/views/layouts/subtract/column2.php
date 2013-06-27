<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/subtract/main'); ?>
	<div class="page-header">
		<div class="container">
			<div class="sixteen columns">
				<h1><?php echo $this->title; ?></h1>
				<span class="sub-title"><?php echo $this->subtitle; ?></span>
			</div>
		</div>
	</div>
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