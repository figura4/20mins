		<header>
			<div class="container">
				<div class="sixteen columns">
					<div class="logo">
						<a href="/"><?php echo Yii::app()->name; ?></a>
						<h1 id="title"><?php echo Yii::app()->params['slogan']; ?></h1>
					</div>
					<?php $this->widget('zii.widgets.CMenu',array(
							'id'=>'nav-bar',
							'items'=>array(
									array('label'=>'Home', 'url'=>'/', 'itemOptions'=>array('class'=>'has-flyout')),
									array('label'=>'Fantascienza', 'url'=>array('/recensioni/categorie/4/fantascienza'), 
										'itemOptions'=>array('class'=>'has-flyout'), 
										'submenuOptions'=>array('class'=>'flyout'),
										'items'=>array(
												array('label'=>'Hard / Tecnologica', 'url'=>array('/recensioni/categorie/23/hard-sf')),
												array('label'=>'Soft / Umanistica', 'url'=>array('/recensioni/categorie/25/soft-sf')),
												array('label'=>'Post Apocalittica', 'url'=>array('/recensioni/categorie/15/post-apocalisse')),
												array('label'=>'Space Opera', 'url'=>array('/recensioni/categorie/5/space-opera')),
												array('label'=>'Cyberpunk & Postcyberpunk', 'url'=>array('/recensioni/categorie/21/cyberpunk')),
												array('label'=>'Steampunk', 'url'=>array('/recensioni/categorie/33/steampunk')),
												array('label'=>'Utopica', 'url'=>array('/recensioni/categorie/16/utopia')),
												array('label'=>'Distopica', 'url'=>array('/recensioni/categorie/7/distopia')),
												array('label'=>'Xenofiction', 'url'=>array('/recensioni/categorie/32/xenofiction')),
										), 
									),
									array('label'=>'Fantasy', 'url'=>array('/recensioni/categorie/31/fantasy'),
										'itemOptions'=>array('class'=>'has-flyout'),
										'submenuOptions'=>array('class'=>'flyout'),
										'items'=>array(
												array('label'=>'High / Epico', 'url'=>array('/recensioni/categorie/8/high-fantasy')),
												array('label'=>'Eroico', 'url'=>array('/recensioni/categorie/62/heroic-fantasy')),
												array('label'=>'Low Fantasy', 'url'=>array('/recensioni/categorie/20/low-fantasy')),
												array('label'=>'Fantasy storico', 'url'=>array('/recensioni/categorie/??/fantasy-storico')),
												array('label'=>'Dark fantasy', 'url'=>array('/recensioni/categorie/26/dark-fantasy')),
												array('label'=>'New Weird', 'url'=>array('/recensioni/categorie/61/new-weird')),
												array('label'=>'Sword & Sorcery', 'url'=>array('/recensioni/categorie/44/sword-sorcery')),
												array('label'=>'Urban Fantasy', 'url'=>array('/recensioni/categorie/12/urban-fantasy')),
										),
									),
									array('label'=>'Recensioni per Tipo', 'url'=>'javascript:void(0)',
											'itemOptions'=>array('class'=>'has-flyout'),
											'submenuOptions'=>array('class'=>'flyout'),
											'items'=>array(
													array('label'=>'Libri, Romanzi e Fumetti', 'url'=>array('/recensioni/libri')),
													array('label'=>'Film e Cortometraggi', 'url'=>array('/recensioni/film')),
													array('label'=>'Serie Tv', 'url'=>array('/recensioni/tv')),
											),
									),
									array('label'=>'Recensioni per Voto', 'url'=>'javascript:void(0)',
											'itemOptions'=>array('class'=>'has-flyout'),
											'submenuOptions'=>array('class'=>'flyout'),
											'items'=>array(
													array('label'=>getHtmlVote(10), 'url'=>array('/recensioni/voto/10')),
													array('label'=>getHtmlVote(9), 'url'=>array('/recensioni/voto/9')),
													array('label'=>getHtmlVote(8), 'url'=>array('/recensioni/voto/8')),
													array('label'=>getHtmlVote(7), 'url'=>array('/recensioni/voto/7')),
													array('label'=>getHtmlVote(6), 'url'=>array('/recensioni/voto/6')),
													array('label'=>getHtmlVote(5), 'url'=>array('/recensioni/voto/5')),
													array('label'=>getHtmlVote(4), 'url'=>array('/recensioni/voto/4')),
													array('label'=>getHtmlVote(3), 'url'=>array('/recensioni/voto/3')),
													array('label'=>getHtmlVote(2), 'url'=>array('/recensioni/voto/2')),
													array('label'=>getHtmlVote(1), 'url'=>array('/recensioni/voto/1')),
											),
									),
									array('label'=>'Blog', 'url'=>array('/blog')),
									array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'itemOptions'=>array('class'=>'has-flyout')),
									array('label'=>'Contact', 'url'=>array('/site/contact'), 'itemOptions'=>array('class'=>'has-flyout')),
    						),
							'encodeLabel'=>false,
							'htmlOptions'=>array('class'=>'nav-bar right'),
					)); ?>
				</div>
			</div>
		</header>