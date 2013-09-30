<?php
$this->breadcrumbs=array(
	'Attendances'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Attendance','url'=>array('index')),
array('label'=>'Create Attendance','url'=>array('create')),
array('label'=>'Update Attendance','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Attendance','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Attendance','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View Attendance #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'class_time_table_id',
		'student_id',
		'date',
		'attendance_detail',
		'cdate',
		'mdate',
),
)); ?>
