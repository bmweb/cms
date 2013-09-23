<?php
$this->breadcrumbs=array(
	'Intakes'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Intake','url'=>array('index')),
array('label'=>'Create Intake','url'=>array('create')),
array('label'=>'Update Intake','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Intake','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Intake','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View Intake #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'code',
		'start_date',
		'end_date',
		'cdate',
		'mdate',
),
)); ?>
