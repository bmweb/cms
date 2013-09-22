<?php
$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Unit','url'=>array('index')),
array('label'=>'Create Unit','url'=>array('create')),
array('label'=>'Update Unit','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Unit','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Unit','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View Unit #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'code',
		'course_id',
		'cdate',
		'mdate',
		'is_active',
),
)); ?>
