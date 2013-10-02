<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'attendance-form',
    'enableAjaxValidation' => false,
        ));
?>



<?php echo $form->errorSummary($model); ?>

<span class="heading colorCyan"><?php echo $classTimeTable->unit->name; ?></span>
<table class="items table table-striped table-bordered">
    <tr>
        <td>
            Class :<?php echo $classTimeTable->from_time;  ?> To <?php echo $classTimeTable->to_time;  ?>
        </td>
        <td>
            Date :<?php echo $classTimeTable->date;  ?>
        </td>
        <td>Trainer : <?php echo $classTimeTable->trainer->fullname;  ?></td>
        <td>Venue : <?php echo $classTimeTable->venue->name;  ?></td>

    </tr>
</table>
<table class="items table table-striped table-bordered">
    <tr>
        <td>
            Sr. No
        </td>
        <td>Registration Id</td>
        <td>Name</td>
        <td>Attendance 1</td>
        <td>Attendance 2</td>
        
    </tr>


    <?php
    $i = 1;
    foreach ($students as $student) {
        ?>
        <tr>
            <?php echo $form->hiddenField($model, 'student_id', array('class' => 'span5')); ?>
            <td><?php echo $i; ?></td>
            <td><?php echo $student->id; ?></td>
            <td><?php echo $student->fullname; ?></td>
            <td class='attendance'>
                <?php echo $form->radioButtonList($model, "attendance_detail[$student->id]",array('1'=>'P', '2'=>'A', '3'=>'L'), array('separator'=>'', 'labelOptions'=>array('style'=>'display:inline;'))); ?>
            </td>
            <td>
               

            </td>
         </tr>
       
        <?php
        $i++;
    }
    ?>
</table>

<?php echo $form->hiddenField($model, 'class_time_table_id', array('class' => 'span5','value'=>$classTimeTable->id)); ?>

<?php echo $form->hiddenField($model, 'date', array('class' => 'span5','value'=>$classTimeTable->date)); ?>

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
