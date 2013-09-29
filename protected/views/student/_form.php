<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'student-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary(array($model, $userModel)); ?>
<legend>Login Information</legend>
<div class="row-fluid">

    <div class="span6">

        <?php echo $form->textFieldRow($userModel, 'email', array('class' => 'span10', 'maxlength' => 100)); ?>
    </div>
    <div class="span6">
        <?php echo $form->passwordFieldRow($userModel, 'password', array('class' => 'span10', 'maxlength' => 100)); ?>
    </div>
</div>
<legend>Basic Information</legend>
<div class="row-fluid">
    <div class="span6">
        <?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span10', 'maxlength' => 45)); ?>


        <?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span10', 'maxlength' => 45)); ?>


        <?php echo $form->textFieldRow($model, 'email', array('class' => 'span10', 'maxlength' => 100)); ?>

        
        <?php echo $form->dropDownListRow($model, 'sex', array('M'=>'Male','F'=>'Female'), array('class' => 'span10', 'maxlength' => 1)); ?>
        
        
        <?php echo $form->datePickerRow($model, 'dob', array('class' => 'span10')); ?>

        
        <?php echo $form->textFieldRow($model, 'address1', array('class' => 'span10', 'maxlength' => 255)); ?>


        <?php echo $form->textFieldRow($model, 'address2', array('class' => 'span10', 'maxlength' => 255)); ?>


        


    </div>
    <div class="span6">
        <?php echo $form->textFieldRow($model, 'city', array('class' => 'span10', 'maxlength' => 45)); ?>


        <?php echo $form->textFieldRow($model, 'state', array('class' => 'span10', 'maxlength' => 45)); ?>

        <?php echo $form->dropDownListRow($model, 'country_id', CHtml::listData(Country::model()->findAll(), 'id', 'name'), array('class' => 'span10', 'prompt' => '--Select--')); ?>
    
        
        <?php echo $form->textFieldRow($model, 'phone', array('class' => 'span10', 'maxlength' => 20)); ?>


        <?php echo $form->textFieldRow($model, 'fax', array('class' => 'span10', 'maxlength' => 20)); ?>


        <?php echo $form->textFieldRow($model, 'zip', array('class' => 'span10', 'maxlength' => 20)); ?>
        
        
        <?php echo $form->dropDownListRow($model, 'is_active', array('1' => 'Active', '0' => 'Deactive'), array('class' => 'span10')); ?>
        
        <?php if(!empty($model->photo_path)){ ?>
            <img src="<?php echo Yii::app()->createUrl('uploads/staff/thumb-'.$model->photo); ?>">
       <?php } ?>
       <?php echo $form->fileFieldRow($model, 'photo', array('class' => 'span10')); ?>

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
