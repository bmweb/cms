<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Student','url'=>array('index')),
array('label'=>'Create Student','url'=>array('create')),
array('label'=>'Update Student','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Student','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Student','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View Student #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'email',
		'address1',
		'address2',
		'city',
		'state',
		'phone',
		'fax',
		'zip',
		'sex',
		'dob',
		'photo',
		'photo_path',
		'cdate',
		'mdate',
		'is_active',
		'country_id',
),
)); ?>
