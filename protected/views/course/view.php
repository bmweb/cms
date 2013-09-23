<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Course','url'=>array('index')),
array('label'=>'Create Course','url'=>array('create')),
array('label'=>'Update Course','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Course','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Course','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View Course #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'code',
		'duration',
		'duration_type',
		'cdate',
		'mdate',
		'is_active',
		'course_level_id',
		'course_field_id',
),
)); ?>
