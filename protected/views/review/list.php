			<?php
			$this->setPageTitle($this->pageTitle.' - '.Yii::app()->name);
			$this->subtitle= 'Elenco recensioni';
			?>

			<div class="eleven columns">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
				    'dataProvider'=>$dataProvider,
					'cssFile' => Yii::app()->request->getBaseUrl().'/css/subtract/tables/tables.css',
					'enableSorting' => false,
				    'columns'=>array(
			    		//'type',
			    		array(
			    				'name'=>'type',
			    				'header'=>'Tipo',
			    				'type'=>'raw',
			    				'value'=>'$data->getHtmlType()',
			    				'htmlOptions'=>array('width'=>'25px', 'style'=>'text-align:center;'),
			    		),
			    		array(
			    				'name'=>'Titolo',
			    				'header'=>'Titolo',
			    				'type'=>'raw',
			    				'value'=>'CHtml::link($data->getFull_title(), Yii::app()->createUrl("review/list"))',
			    		),
				    	array(            
				    	    'name'=>'authorName',
				    		'header'=>'Autore',
				    	    'value'=>'$data->author->getFullName()',
				    		'htmlOptions'=>array('width'=>'230px'),
				    	),
				    	//'vote',       
			    		array(
			    			'name'=>'htmlVote',
			    			'header'=>'Voto',
			    			'type'=>'raw',
			    			'value'=>'$data->getHtmlVote()',
			    			'htmlOptions'=>array('width'=>'80px', 'style'=>'padding-left:15px;'),
			    		),
				    ),
				)); ?>
			</div>