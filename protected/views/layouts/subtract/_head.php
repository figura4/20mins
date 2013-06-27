<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="description" content="<?php echo Yii::app()->params['siteDescription']; ?>">
	<meta name="author" content="<?php echo Yii::app()->params['author']; ?>">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->getBaseUrl(); ?>/css/subtract/stylesheets/screen.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->getBaseUrl(); ?>/css/subtract/stylesheets/jquery.fancybox-1.3.4.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->getBaseUrl(); ?>/css/subtract/icon_fonts.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->getBaseUrl(); ?>/css/subtract/flexslider.css">
	<!--[if IE ]><link rel="stylesheet" href="<?php echo Yii::app()->request->getBaseUrl(); ?>/css/ie.css"><!--<![endif]-->
	
	
	<!-- Google Fonts
  ================================================== -->
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,400,300,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<?php /** @TODO set favicon */ ?>
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

</head>
