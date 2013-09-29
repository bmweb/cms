
<?php 
$dataProvider=new CActiveDataProvider('StudentCourseFeeMap',array(
                    'criteria'=>array('condition'=>"student_course_id=$id")
                ));
?>

<div style="width:500px">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'student-course-fee-map-grid',
	'dataProvider'=>$dataProvider,
	'type'=>'striped bordered condensed',
        'enableSorting' => false,
	'columns'=>array(
		//'id',
                array(
                    'header'=>"Course",
                    'value'=>'$data->studentCourse->course->name',
                ),
		array(
                    'header'=>"Intake",
                    'value'=>'$data->studentCourse->intake->name',
                ),
                array('name'=>'paid_fee',
                      'type'=>'text',
                      'footer'=>  StudentCourseFeeMap::model()->getTotalPaidFee($dataProvider),
                      //'htmlOptions'=>array('style' => 'text-align: right;'),
                    ),
                array(
                    'header'=>"Date",
                    'value'=>'$data->cdate',
                ),
		
		//'cdate',
		//'mdate',
		
		
	),
)); ?>
</div>