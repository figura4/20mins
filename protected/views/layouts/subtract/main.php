<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<!-- Head
 ================================================== -->
<?php $this->renderPartial('//layouts/subtract/_head'); ?> 

<body>

	<!-- Primary Page Layout
	================================================== -->
	<div id="wrap">
		
		<!-- Header/Main Nav
		================================================== -->
		<?php $this->renderPartial('//layouts/subtract/_header'); ?> 
				
		<!-- Main Content
		================================================== -->
		<?php echo $content; ?>
		
		<!-- Footer
		================================================== -->
		<?php $this->renderPartial('//layouts/subtract/_footer'); ?> 

	</div><!-- End Wrap -->

	<!-- Javascript/jQuery
	================================================== -->
	<?php $this->renderPartial('//layouts/subtract/_javascript'); ?> 

<!-- End Document
================================================== -->
</body>
</html>