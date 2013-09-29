
<?php Yii::app()->params['mod_title'] = 'Change Password';?><?php Yii::app()->params['mod_desc'] = 'Fields with * are required ';?> 

<?php
$this->breadcrumbs = array(
    'Change Password',
);
?>

<div class="row-fluid ">
     
            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'password-form',
                'type'	=>	'horizontal',
                'enableAjaxValidation' => false,
                    ));
            ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php echo $form->errorSummary($model); ?>
           
                  
                        <?php echo $form->passwordFieldRow($model, 'oldpassword', array('size' => 50, 'maxlength' => 50)); ?>
               
               
                        <?php echo $form->passwordFieldRow($model, 'password', array('size' => 50, 'maxlength' => 50)); ?>
                      
                  
              
                        <?php echo $form->passwordFieldRow($model, 'retypePassword', array('size' => 50, 'maxlength' => 50)); ?>
                  
             
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" onclick="history.back();" class="btn">Cancel</button>
                </div>
           
            <?php $this->endWidget(); ?>
      
      
</div>