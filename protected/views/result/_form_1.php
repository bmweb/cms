<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'result-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

        	<?php echo $form->textFieldRow($model,'student_id',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'course_id',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'unit_id',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'intake_id',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'internal_marks',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'external_marks',array('class'=>'span5')); ?>
		

        	

        	

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
