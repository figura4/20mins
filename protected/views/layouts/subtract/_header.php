		<header>
			<div class="container">
				<div class="sixteen columns">
					<div class="logo">
						<a href="#">20mins</a>
						<h1 id="title">20 minutes into the future...</h1>
					</div>
					<!-- 
					<ul class="nav-bar right" id="nav-bar">
						<li class="has-flyout active"><a href="index.html">Home</a>
						<li class="has-flyout"><a href="index.html">About</a>
						<li class="has-flyout"><a href="index.html">Contact</a>
					</ul> -->
					<?php $this->widget('zii.widgets.CMenu',array(
							'id'=>'nav-bar',
							'items'=>array(
									array('label'=>'Home', 'url'=>array('/site/index'), 'itemOptions'=>array('class'=>'has-flyout')),
									array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'itemOptions'=>array('class'=>'has-flyout')),
									array('label'=>'Contact', 'url'=>array('/site/contact'), 'itemOptions'=>array('class'=>'has-flyout')),
    						),
							'htmlOptions'=>array('class'=>'nav-bar right'),
					)); ?>
				</div>
			</div>
		</header>
		
		<div class="page-header">
			<div class="container">
				<div class="sixteen columns">
					<h1>20mins</h1>
					<span class="sub-title">20 minutes into the future...</span>
				</div>
			</div>
		</div>
