<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'class_time_table_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'student_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'attendance_detail',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'cdate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'mdate',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
