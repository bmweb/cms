<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

        	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>45)); ?>
		

        	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>45)); ?>
		

        	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>
		

        	<?php echo $form->textFieldRow($model,'address1',array('class'=>'span5','maxlength'=>255)); ?>
		

        	<?php echo $form->textFieldRow($model,'address2',array('class'=>'span5','maxlength'=>255)); ?>
		

        	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>45)); ?>
		

        	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5','maxlength'=>45)); ?>
		

        	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>20)); ?>
		

        	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5','maxlength'=>20)); ?>
		

        	<?php echo $form->textFieldRow($model,'zip',array('class'=>'span5','maxlength'=>20)); ?>
		

        	<?php echo $form->textFieldRow($model,'sex',array('class'=>'span5','maxlength'=>1)); ?>
		

        	<?php echo $form->textFieldRow($model,'dob',array('class'=>'span5')); ?>
		

        	<?php echo $form->textAreaRow($model,'photo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
		

        	<?php echo $form->textAreaRow($model,'photo_path',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
		

        	

        	

        	<?php echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'country_id',array('class'=>'span5')); ?>
		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
