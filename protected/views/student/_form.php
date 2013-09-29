
<script>
    function delRow(obj)
    {

	$(obj).parents('tr:first').remove();
    }

    $(document).ready(function() {
	$("#yw0").click(function() {

	});
	$(".course_applied").click(function() {
	    var count = $("tr").length;
	    var i = count - 1;
	    var html = "<tr><td>";
	    html += "<select class='span6' name='course_applied[course_list][]' onchange='getintake(this.value," + i + ");'> " + '<?php echo Course::course_list('new'); ?>' + "</select></td>";
	    html += "<td><select class='span6' name='course_applied[intake][]' id='intake_date_" + i + "'></select></td>";
	    html += "<td>Rs<input type='text' name='course_applied[course_fee][]' id='course_fee_" + i + "'/></td>";
            html += "<td><a href='javascript:void(0)' class='delete' onclick='delRow(this);'><img src='<?php echo Yii::app()->baseUrl; ?>/images/error.gif'></a></td></tr>";
	    $("#courses").append(html);
	});

	
    });
    function getintake(id, row_id)
    {

	$.ajax({
	    type: "POST",
	    url: "<?php echo Yii::app()->baseUrl; ?>/intake/getintake",
	    data: {course: id},
	    dataType: "text",
	    success: function(data) {

		$('#intake_date_' + row_id).empty("");
		$('#intake_date_' + row_id).append(data);
		//  alert(data);
	    },
	});



    }

  
</script>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'student-form',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array(
        'enctype' => 'multipart/form-data',
    ),
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
        
        <?php if(!empty($model->photo)){ ?>
            <img src="<?php echo Yii::app()->createUrl('uploads/student/thumb-'.$model->photo); ?>">
       <?php } ?>
       <?php echo $form->fileFieldRow($model, 'photo', array('class' => 'span10')); ?>

    </div>
</div>
<div class="row-fluid">
    <legend class="serif colorCyan">Courses Detail<span class="btn btn-info course_applied" style="float: right;">Add Course</span></legend>
    <table class="items table table-striped" id="courses" style="padding: 0px;">
        <thead class="tableFloatingHeaderOriginal">
            <tr>
                <th id="yw0_c0" style=" color: #000; ">Course</th>
                <th id="yw0_c1" style=" color: #000; ">Intake</th>
                <th id="yw0_c2" style=" color: #000; ">Course Fee</th>
<!--                <th id="yw0_c2" style=" color: #000; ">Start Date</th>
                <th id="yw0_c2" style=" color: #000; ">End Date</th>
                <th id="yw0_c3" style=" color: #000; ">Course Weeks</th>-->
                <th class="button-column" id="yw0_c5" style=" color: #000; ">Action</th>
            </tr>
        </thead>

        <tbody>
	    <?php
	    if (!empty($model->id)) {
		StudentCourse::getStudentCourse($model->id);
	    }
	    ?>
        </tbody>
    </table>
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
