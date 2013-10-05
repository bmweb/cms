<?php
$this->breadcrumbs=array(
	'Results'=>array('index'),
	$model->id,
);

?>


<?php Yii::app()->params['mod_title'] = 'View Result #'.$model->id;?>
    <?php
    if (count($students) > 0) {
       ?>
<table class="items table table-striped table-bordered">
    <tr>
        <th>Student</th>
        <th>Internal Marks</th>
        <th>External Marks</th>
        <th>Total Marks</th>
    </tr>
<?php
        foreach ($students as $student) {
            ?>

            <tr>
                <td>
                    <?php echo $student->fullname; ?>
                    
                    <?php 
                        $currentStudentresult = Result::checkResult($student->id, $model->unit_id,$model->intake_id);
                        $currentStudentInternalMarks=null;
                        $currentStudentExternalMarks=null;
                        if(isset($currentStudentresult) && !empty($currentStudentresult)){
                            $currentStudentInternalMarks=$currentStudentresult->internal_marks;
                            $currentStudentExternalMarks=$currentStudentresult->external_marks;
                        }
                    ?>
                </td>
                <td>
                    <?php echo $currentStudentInternalMarks; ?>
                </td>

                <td>
                    <?php echo $currentStudentExternalMarks; ?>
                </td>
                <td>
                    <?php echo $currentStudentInternalMarks + $currentStudentExternalMarks; ?>
                </td>
            </tr>

            <?php
            
        }
   
    ?>
          
</table>
<?php  } ?>
