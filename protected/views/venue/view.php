<?php
$this->breadcrumbs=array(
	'Venues'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Venue','url'=>array('index')),
array('label'=>'Create Venue','url'=>array('create')),
array('label'=>'Update Venue','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Venue','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Venue','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View Venue #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'cdate',
		'mdate',
		'is_active',
),
)); ?>
