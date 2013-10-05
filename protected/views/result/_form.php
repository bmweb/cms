
<script>
$(function(){
    $('input:checkbox').attr('checked', 'checked');
    
});
$('#checkAll').live('click', (function() {
    if($(this).is(':checked')) {
        $('input:checkbox').attr('checked', 'checked');
    } else {
        $('input:checkbox').removeAttr('checked');
    }
}));
</script>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'result-form',
	'enableAjaxValidation'=>false,
)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

       <?php
    if (count($students) > 0) {
        $i = 1;
        ?>
<table class="items table table-striped table-bordered">
    <tr>
        <th><input type="checkbox" name="checkAll" id="checkAll"> &nbsp; Student</th>
        <th>Internal Marks</th>
        <th>External Marks</th>
    </tr>
<?php
        foreach ($students as $student) {
            ?>

            <tr>
                <td>
                    <?php echo $form->checkBoxList($model,"student_id[]",array($student->id=>$student->fullname)) ?>
                    
                    <?php 
                        $currentStudentresult = Result::checkResult($student->id, $model->unit_id,$model->intake_id);
                        $currentStudentInternalMarks=null;
                        $currentStudentExternalMarks=null;
                        if(isset($currentStudentresult) && !empty($currentStudentresult)){
                            echo "(Result already exist)";
                            $currentStudentInternalMarks=$currentStudentresult->internal_marks;
                            $currentStudentExternalMarks=$currentStudentresult->external_marks;
                        }
                    ?>
                </td>
                <td>
                    <?php echo $form->textField($model,"internal_marks[$student->id]",array('class'=>'span1','value'=>$currentStudentInternalMarks)); ?>
                </td>

                <td>
                    <?php echo $form->textField($model,"external_marks[$student->id]",array('class'=>'span1','value'=>$currentStudentExternalMarks)); ?>
                </td>
            </tr>

            <?php
            $i++;
        }
   
    ?>
            <?php echo $form->hiddenField($model,"intake_id",array('class'=>'span1')); ?>
            <?php echo $form->hiddenField($model,"unit_id",array('class'=>'span1')); ?>
            <?php echo $form->hiddenField($model,"course_id",array('class'=>'span1')); ?>
                
</table>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Save' : 'Save',
    ));
    ?>
</div>
<?php  } ?>

<?php $this->endWidget(); ?>
