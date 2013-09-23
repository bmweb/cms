<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'staff-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

        	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>
		

        	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>
		

        	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>
		

        	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>45)); ?>
		

        	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5','maxlength'=>45)); ?>
		

        	<?php echo $form->textFieldRow($model,'zip_code',array('class'=>'span5','maxlength'=>20)); ?>
		

        	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>20)); ?>
		

        	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5','maxlength'=>20)); ?>
		

        	<?php echo $form->textAreaRow($model,'photo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
		

        	<?php echo $form->textAreaRow($model,'photo_path',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
		

        	<?php echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>
		

        	

        	

        	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'country_id',array('class'=>'span5')); ?>
		

        	<?php echo $form->textFieldRow($model,'join_date',array('class'=>'span5')); ?>
		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
