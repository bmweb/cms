<?php
$this->breadcrumbs=array(
	'Results'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Result','url'=>array('index')),
array('label'=>'Create Result','url'=>array('create')),
array('label'=>'Update Result','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Result','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Result','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View Result #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'student_id',
		'course_id',
		'unit_id',
		'intake_id',
		'internal_marks',
		'external_marks',
		'cdate',
		'mdate',
),
)); ?>
