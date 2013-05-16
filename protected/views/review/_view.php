<?php
/* @var $this ReviewController */
/* @var $data Review */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode(User::model()->findByPk($data->user_id)->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cover')); ?>:</b>
	<?php echo CHtml::encode($data->cover); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture1')); ?>:</b>
	<?php echo CHtml::encode($data->picture1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture2')); ?>:</b>
	<?php echo CHtml::encode($data->picture2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture3')); ?>:</b>
	<?php echo CHtml::encode($data->picture3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('italian_title')); ?>:</b>
	<?php echo CHtml::encode($data->italian_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('italian_subtitle')); ?>:</b>
	<?php echo CHtml::encode($data->italian_subtitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('original_title')); ?>:</b>
	<?php echo CHtml::encode($data->original_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('original_subtitle')); ?>:</b>
	<?php echo CHtml::encode($data->original_subtitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vote')); ?>:</b>
	<?php echo CHtml::encode($data->vote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	<?php echo CHtml::encode(
					Author::model()->findByPk($data->author_id)->last_name . ', ' .
					Author::model()->findByPk($data->author_id)->first_name
			); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actors')); ?>:</b>
	<?php echo CHtml::encode($data->actors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nation')); ?>:</b>
	<?php echo CHtml::encode($data->nation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pages')); ?>:</b>
	<?php echo CHtml::encode($data->pages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editor')); ?>:</b>
	<?php echo CHtml::encode($data->editor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
	<?php echo CHtml::encode($data->language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seasons')); ?>:</b>
	<?php echo CHtml::encode($data->seasons); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pub_date')); ?>:</b>
	<?php echo CHtml::encode($data->pub_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_on')); ?>:</b>
	<?php echo CHtml::encode($data->updated_on); ?>
	<br />

</div>