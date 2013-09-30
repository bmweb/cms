<?php
$this->breadcrumbs=array(
	'Class Time Tables'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ClassTimeTable','url'=>array('index')),
array('label'=>'Create ClassTimeTable','url'=>array('create')),
array('label'=>'Update ClassTimeTable','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ClassTimeTable','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ClassTimeTable','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View ClassTimeTable #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'course_id',
		'intake_id',
		'unit_id',
		'trainer_id',
		'venue_id',
		'date',
		'from_time',
		'to_time',
		'cdate',
		'mdate',
),
)); ?>
