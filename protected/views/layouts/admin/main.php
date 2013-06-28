<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	
	<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'Admin', 'url'=>'', 'visible'=>!Yii::app()->user->isGuest,
                	'items'=>array(
                    	array('label'=>'Contents', 'url'=>array('/content/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Reviews', 'url'=>array('/review/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Authors', 'url'=>array('/author/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Quotes', 'url'=>array('/quote/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Tags', 'url'=>array('/tag/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Comments', 'url'=>array('/comment/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Users', 'url'=>array('/user/admin'), 'visible'=>!Yii::app()->user->isGuest),
                  	),
                ),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
    )); ?>
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Oscar Riva.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
