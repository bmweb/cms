<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'attendance-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

        	<?php echo $form->textFieldRow($model,'class_time_table_id',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'student_id',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'attendance_detail',array('class'=>'span5')); ?>
		

        	

        	

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
