<?php
$id = $_GET['id'];
$criteria = new CDbCriteria();
$criteria->condition = "student_id = $id";
$studentCourse = StudentCourse::model()->findAll($criteria);
?>
<div class="success"></div>
<form id="addFeeForm" action="#" method="post">
    <table class="items table table-striped table-bordered" style="width: 600px">   

        <tr>
            <th>Course</th>
            <th>Intake</th>
            <th>Fee</th>
            <th></th>
        </tr>
        <?php foreach ($studentCourse as $data) { ?>
            <tr>

                <td><?php echo $data->course->name; ?></td>
                <td><?php echo $data->intake->name; ?></td>
                <td><?php echo Yii::app()->locale->getCurrencySymbol('AUD') . $data->course_fee; ?></td>
                <td><input type="hidden" id="student_course_id" name="student_course_id[]" value="<?php echo $data->id; ?>">
                    <?php echo Yii::app()->locale->getCurrencySymbol('AUD') ?><input type="text" name="paid_fee[]" id="paid_fee">
                </td>

            </tr>   
        <?php } ?>


    </table>
    <div class="pull-right">
    <input type="submit" name="submit" value="Add" class="btn btn-success" id="submit">
    </div>
</form>
<script>
    $(function(){
        $('#addFeeForm').submit(function() {
            
            $.ajax({
                url: '<?php echo Yii::app()->createUrl("student/addFee"); ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    if (data == "success")
                    {
                        $('.success').addClass('alert alert-success').html("Fee added successfully");
                        setTimeout(function() {   
                        $('.close').click();
                        }, 4000);
                        
                    }
                   
                }
            })
            return false;
        });
    });
</script>