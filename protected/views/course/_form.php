<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

        	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>
		

        	<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>20)); ?>
		
                <?php echo $form->dropDownListRow($model, 'course_level_id', CHtml::listData(CourseLevel::model()->findAll(), 'id', 'name'), array('class' => 'span5', 'empty' => '-- Select --')); ?>
                
                <?php echo $form->dropDownListRow($model,'duration_type', array('Week'=>'Week', 'Month'=>'Month', 'Year'=>'Year'), array('class'=>'span2', 'empty' => '-- Select --')); ?>

        	<?php echo $form->textFieldRow($model,'duration',array('class'=>'span2')); ?>
		
        	<?php //echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>
		
        	<?php //echo $form->textFieldRow($model,'course_field_id',array('class'=>'span5')); ?>
	
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
