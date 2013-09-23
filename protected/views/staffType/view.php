<?php
$this->breadcrumbs=array(
	'Staff Types'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List StaffType','url'=>array('index')),
array('label'=>'Create StaffType','url'=>array('create')),
array('label'=>'Update StaffType','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete StaffType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage StaffType','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View StaffType #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
),
)); ?>
