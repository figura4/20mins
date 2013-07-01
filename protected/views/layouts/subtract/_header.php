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
									array('label'=>'Home', 'url'=>array('site/index'), 'itemOptions'=>array('class'=>'has-flyout')),
									array('label'=>'Fantascienza', 'url'=>array('review/list', 'tagId'=>4, 'tag'=>'fantascienza'), 
										'itemOptions'=>array('class'=>'has-flyout'), 
										'submenuOptions'=>array('class'=>'flyout'),
										'items'=>array(
												array('label'=>'Hard / Tecnologica', 'url'=>array('review/list', 'tagId'=>23, 'tag'=>'hard-sf')),
												array('label'=>'Soft / Umanistica', 'url'=>array('review/list', 'tagId'=>25, 'tag'=>'soft-sf')),
												array('label'=>'Post Apocalittica', 'url'=>array('review/list', 'tagId'=>15, 'tag'=>'post-apocalisse')),
												array('label'=>'Space Opera', 'url'=>array('review/list', 'tagId'=>5, 'tag'=>'space-opera')),
												array('label'=>'Cyberpunk & Postcyberpunk', 'url'=>array('review/list', 'tagId'=>21, 'tag'=>'cyberpunk')),
												array('label'=>'Steampunk', 'url'=>array('review/list', 'tagId'=>33, 'tag'=>'steampunk')),
												array('label'=>'Utopica', 'url'=>array('review/list', 'tagId'=>16, 'tag'=>'utopia')),
												array('label'=>'Distopica', 'url'=>array('review/list', 'tagId'=>7, 'tag'=>'distopia')),
												array('label'=>'Xenofiction', 'url'=>array('review/list', 'tagId'=>32, 'tag'=>'xenofiction')),
										), 
									),
									array('label'=>'Fantasy', 'url'=>array('review/list', 'tagId'=>31, 'tag'=>'fantasy'),
										'itemOptions'=>array('class'=>'has-flyout'),
										'submenuOptions'=>array('class'=>'flyout'),
										'items'=>array(
												array('label'=>'High / Epico', 'url'=>array('review/list', 'tagId'=>8, 'tag'=>'high-fantasy')),
												array('label'=>'Eroico', 'url'=>array('review/list', 'tagId'=>62, 'tag'=>'heroic-fantasy')),
												array('label'=>'Low Fantasy', 'url'=>array('review/list', 'tagId'=>20, 'tag'=>'low-fantasy')),
												array('label'=>'Fantasy storico', 'url'=>array('review/list', 'tagId'=>66, 'tag'=>'fantasy-storico')),
												array('label'=>'Dark fantasy', 'url'=>array('review/list', 'tagId'=>26, 'tag'=>'dark-fantasy')),
												array('label'=>'New Weird', 'url'=>array('review/list', 'tagId'=>61, 'tag'=>'new-weird')),
												array('label'=>'Sword & Sorcery', 'url'=>array('review/list', 'tagId'=>44, 'tag'=>'sword-sorcery')),
												array('label'=>'Urban Fantasy', 'url'=>array('review/list', 'tagId'=>12, 'tag'=>'urban-fantasy')),
										),
									),
									array('label'=>'Recensioni per Tipo', 'url'=>array('/'),
											'itemOptions'=>array('class'=>'has-flyout'),
											'submenuOptions'=>array('class'=>'flyout'),
											'items'=>array(
													array('label'=>'Libri, Romanzi e Fumetti', 'url'=>array('review/list', 'type'=>'book')),
													array('label'=>'Film e Cortometraggi', 'url'=>array('review/list', 'type'=>'movie')),
													array('label'=>'Serie Tv', 'url'=>array('review/list', 'type'=>'tv')),
											),
									),
									array('label'=>'Recensioni per Voto', 'url'=>array('/'),
											'itemOptions'=>array('class'=>'has-flyout'),
											'submenuOptions'=>array('class'=>'flyout'),
											'items'=>array(
													array('label'=>getHtmlVote(10), 'url'=>array('review/list', 'vote'=>'10')),
													array('label'=>getHtmlVote(9), 'url'=>array('review/list', 'vote'=>'9')),
													array('label'=>getHtmlVote(8), 'url'=>array('review/list', 'vote'=>'8')),
													array('label'=>getHtmlVote(7), 'url'=>array('review/list', 'vote'=>'7')),
													array('label'=>getHtmlVote(6), 'url'=>array('review/list', 'vote'=>'6')),
													array('label'=>getHtmlVote(5), 'url'=>array('review/list', 'vote'=>'5')),
													array('label'=>getHtmlVote(4), 'url'=>array('review/list', 'vote'=>'4')),
													array('label'=>getHtmlVote(3), 'url'=>array('review/list', 'vote'=>'3')),
													array('label'=>getHtmlVote(2), 'url'=>array('review/list', 'vote'=>'2')),
													array('label'=>getHtmlVote(1), 'url'=>array('review/list', 'vote'=>'1')),
											),
									),
									array('label'=>'Blog', 'url'=>array('content/list')),
									array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'itemOptions'=>array('class'=>'has-flyout')),
									array('label'=>'Contact', 'url'=>array('/site/contact'), 'itemOptions'=>array('class'=>'has-flyout')),
    						),
							'encodeLabel'=>false,
							'activeCssClass'=>'active',
							'activateParents'=>true,
							'htmlOptions'=>array('class'=>'nav-bar right'),
					)); ?>
				</div>
			</div>
		</header>