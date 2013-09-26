<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'unit-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">

    <div class="span6">
        <?php echo $form->textFieldRow($model, 'name', array('class' => 'span10', 'maxlength' => 100)); ?>


        <?php echo $form->textFieldRow($model, 'code', array('class' => 'span10', 'maxlength' => 20)); ?>


        <?php echo $form->dropDownListRow($model, 'course_id', CHtml::listData(Course::model()->findAll(), 'id', 'name'), array('class' => 'span10', 'prompt' => '--Select--')); ?>


        <?php echo $form->dropDownListRow($model, 'is_active', array('1' => 'Active', '0' => 'Deactive'), array('class' => 'span10')); ?>

    </div>
    <div class="span6">
        <?php echo $form->checkBoxListRow($model,'trainer',  CHtml::listData(Staff::model()->findAll(array('condition'=>"is_active=1 and type=1")), 'id', 'name')) ?>
            
        <?php //echo $form->checkBoxListRow($model, 'code', array('class' => 'span10', 'maxlength' => 20)); ?>

    </div>    
</div>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Create' : 'Save',
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>
