<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'intake-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">

    <div class="span6">
        <?php echo $form->textFieldRow($model, 'name', array('class' => 'span10', 'maxlength' => 45)); ?>


        <?php echo $form->textFieldRow($model, 'code', array('class' => 'span10', 'maxlength' => 20)); ?>


        <?php echo $form->datePickerRow($model, 'start_date', array('class' => 'span10')); ?>


        <?php echo $form->datePickerRow($model, 'end_date', array('class' => 'span10')); ?>
    </div>	
    <div class="span6">
        <?php echo $form->checkBoxListRow($model, 'course', CHtml::listData(Course::model()->findAll(array('condition' => "is_active=1")), 'id', 'name')) ?>


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
