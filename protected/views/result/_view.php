<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::encode($data->course_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_id')); ?>:</b>
	<?php echo CHtml::encode($data->unit_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intake_id')); ?>:</b>
	<?php echo CHtml::encode($data->intake_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('internal_marks')); ?>:</b>
	<?php echo CHtml::encode($data->internal_marks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('external_marks')); ?>:</b>
	<?php echo CHtml::encode($data->external_marks); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cdate')); ?>:</b>
	<?php echo CHtml::encode($data->cdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mdate')); ?>:</b>
	<?php echo CHtml::encode($data->mdate); ?>
	<br />

	*/ ?>

</div>