<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'course_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'intake_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'unit_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'trainer_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'venue_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'from_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'to_time',array('class'=>'span5')); ?>

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
