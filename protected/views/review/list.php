<div class="eleven columns">
	<h1>Manage Reviews</h1>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'columns'=>array(
	        'original_title',         
	    	array(            
	    	    'name'=>'authorName',
	    	    'value'=>'$data->author->getFullName()',
	    	),
	    	'vote',          
	    ),
	)); ?>
</div>
