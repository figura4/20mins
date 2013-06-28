	<?php
	$this->setPageTitle(Yii::app()->name . ' - Admin'); 
	$this->title='Admin';
	$this->subtitle='Website administration';
	?>

	<div>
		<h4>Authors</h4>
		<p>Manage authors and directors of the reviewed books and movies.</p>
		<ul class="arrows">
			<li><?php echo CHtml::link('Manage authors', yii::app()->createUrl('author/admin')); ?></li>
			<li><?php echo CHtml::link('Create new author', yii::app()->createUrl('author/create')); ?></li>
		</ul>
	</div>
	
	<div>
		<h4>Contents</h4>
		<p>Manage blog pages.</p>
		<ul class="arrows">
			<li><?php echo CHtml::link('Manage posts', yii::app()->createUrl('content/admin')); ?></li>
			<li><?php echo CHtml::link('Create new post', yii::app()->createUrl('content/create')); ?></li>
		</ul>
	</div>
	
	<div>
		<h4>Reviews</h4>
		<p>Manage reviews.</p>
		<ul class="arrows">
			<li><?php echo CHtml::link('Manage reviews', yii::app()->createUrl('review/admin')); ?></li>
			<li><?php echo CHtml::link('Create new reviews', yii::app()->createUrl('review/create')); ?></li>
		</ul>
	</div>

	<div>
		<h4>Tags</h4>
		<p>Manage tags.</p>
		<ul class="arrows">
			<li><?php echo CHtml::link('Manage tags', yii::app()->createUrl('tag/admin')); ?></li>
			<li><?php echo CHtml::link('Create new tags', yii::app()->createUrl('tag/create')); ?></li>
		</ul>
	</div>
	
	<div>
		<h4>Quotes</h4>
		<p>Manage quotes.</p>
		<ul class="arrows">
			<li><?php echo CHtml::link('Manage quotes', yii::app()->createUrl('quote/admin')); ?></li>
			<li><?php echo CHtml::link('Create new quotes', yii::app()->createUrl('quote/create')); ?></li>
		</ul>
	</div>
	
	<div>
		<h4>Users</h4>
		<p>Manage Users.</p>
		<ul class="arrows">
			<li><?php echo CHtml::link('Manage Users', yii::app()->createUrl('User/admin')); ?></li>
			<li><?php echo CHtml::link('Create new Users', yii::app()->createUrl('User/create')); ?></li>
		</ul>
	</div>
