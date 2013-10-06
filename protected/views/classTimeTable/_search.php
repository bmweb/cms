<script>
    $(function() {
        var courseId = <?php echo $model->course_id; ?>;
        var unitId = <?php echo $model->unit_id; ?>;
        if(courseId){
            $.ajax({
                'type': 'POST',
                'data': {course_id:courseId},
                'url': '<?php echo Yii::app()->createUrl('unit/unitByCourse') ?>',
                'success': function(data) {
                    $("#ClassTimeTable_unit_id").html(data);
                    $("#ClassTimeTable_unit_id").val(unitId);
                }
            });
            return false;
            }
    });
</script>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="row-fluid">
	<div class="span3">
	<?php echo $form->dropDownListRow($model, 'intake_id', CHtml::listData(Intake::model()->findAll(), 'id', 'name'), array('class' => 'span10', 'prompt' => '--Select--')); ?>
                
         </div>
        <div class="span3">   
		<?php 
                if(!Yii::app()->user->isGuest && User::isStudent()){
                    $studentId = Yii::app()->user->user_id;
                    $criteria = new CDbCriteria;
                    $criteria->with = array('studentCourses');
                    $criteria->condition = "studentCourses.student_id=".$studentId;
                    $course = Course::model()->findAll($criteria);
                }else{
                    $course = Course::model()->findAll();
                }
                
                echo $form->dropDownListRow($model, 'course_id', CHtml::listData($course, 'id', 'name'), array('class' => 'span10', 'prompt' => '--Select--',
                    'ajax'=>array(
                                    'type'=>'POST',
                                    'data'=>array('course_id'=>"js:this.value"),
                                    'url'=>CController::createUrl('unit/unitByCourse'),
                                    'update'=>'#'.CHtml::activeId($model,'unit_id'), 
                                )
                    )); ?>
</div>
        <div class="span3">
		<?php echo $form->dropDownListRow($model, 'unit_id', array(), array('class' => 'span10', 'prompt' => '--Select--',)); ?>
</div>
      

	<div class="span3">
            <label>&nbsp;</label>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Show Venue',
                        'htmlOptions'=>array('name'=>'search','value'=>'search'),
                        
		)); ?>
	</div>
</div>

<?php $this->endWidget(); ?>

