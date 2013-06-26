		<header>
			<div class="container">
				<div class="sixteen columns">
					<div class="logo">
						<a href="#">20mins</a>
						<h1 id="title">20 minutes into the future...</h1>
					</div>
					<?php $this->widget('zii.widgets.CMenu',array(
							'id'=>'nav-bar',
							'items'=>array(
									array('label'=>'Home', 'url'=>array('/site/index'), 'itemOptions'=>array('class'=>'has-flyout')),
									array('label'=>'Fantascienza', 'url'=>array('/site/index4'), 
										'itemOptions'=>array('class'=>'has-flyout'), 
										'submenuOptions'=>array('class'=>'flyout'),
										'items'=>array(
												array('label'=>'Hard / Tecnologica', 'url'=>array('/site/index2')),
												array('label'=>'Soft / Umanistica', 'url'=>array('/site/index3')),
												array('label'=>'Post Apocalittica', 'url'=>array('/site/index3')),
												array('label'=>'Space Opera', 'url'=>array('/site/index3')),
												array('label'=>'Cyberpunk & Postcyberpunk', 'url'=>array('/site/index3')),
												array('label'=>'Steampunk', 'url'=>array('/site/index3')),
												array('label'=>'Utopica', 'url'=>array('/site/index3')),
												array('label'=>'Distopica', 'url'=>array('/site/index3')),
												array('label'=>'Xenofiction', 'url'=>array('/site/index3')),
										), 
									),
									array('label'=>'Fantasy', 'url'=>array('/site/index6'),
										'itemOptions'=>array('class'=>'has-flyout'),
										'submenuOptions'=>array('class'=>'flyout'),
										'items'=>array(
												array('label'=>'High / Epico', 'url'=>array('/site/index7')),
												array('label'=>'Eroico', 'url'=>array('/site/index8')),
												array('label'=>'Low Fantasy', 'url'=>array('/site/index8')),
												array('label'=>'Fantasy storico', 'url'=>array('/site/index8')),
												array('label'=>'Dark fantasy', 'url'=>array('/site/index8')),
												array('label'=>'New Weird', 'url'=>array('/site/index8')),
												array('label'=>'Sword & Sorcery', 'url'=>array('/site/index8')),
												array('label'=>'Urban Fantasy', 'url'=>array('/site/index8')),
										),
									),
									array('label'=>'Recensioni per Tipo', 'url'=>array('/site/index6'),
											'itemOptions'=>array('class'=>'has-flyout'),
											'submenuOptions'=>array('class'=>'flyout'),
											'items'=>array(
													array('label'=>'Libri, Romanzi e Fumetti', 'url'=>array('/site/index7')),
													array('label'=>'Film e Cortometraggi', 'url'=>array('/site/index8')),
													array('label'=>'Serie Tv', 'url'=>array('/site/index9')),
											),
									),
									array('label'=>'Recensioni per Voto', 'url'=>array('/site/index6'),
											'itemOptions'=>array('class'=>'has-flyout'),
											'submenuOptions'=>array('class'=>'flyout'),
											'items'=>array(
													array('label'=>'10', 'url'=>array('/site/index7')),
													array('label'=>'9', 'url'=>array('/site/index8')),
													array('label'=>'9', 'url'=>array('/site/index9')),
											),
									),
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
