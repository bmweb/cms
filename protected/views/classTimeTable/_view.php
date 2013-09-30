<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::encode($data->course_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intake_id')); ?>:</b>
	<?php echo CHtml::encode($data->intake_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_id')); ?>:</b>
	<?php echo CHtml::encode($data->unit_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trainer_id')); ?>:</b>
	<?php echo CHtml::encode($data->trainer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('venue_id')); ?>:</b>
	<?php echo CHtml::encode($data->venue_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('from_time')); ?>:</b>
	<?php echo CHtml::encode($data->from_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_time')); ?>:</b>
	<?php echo CHtml::encode($data->to_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cdate')); ?>:</b>
	<?php echo CHtml::encode($data->cdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mdate')); ?>:</b>
	<?php echo CHtml::encode($data->mdate); ?>
	<br />

	*/ ?>

</div>