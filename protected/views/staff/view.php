<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->first_name,
);

$this->menu=array(
array('label'=>'List Staff','url'=>array('index')),
array('label'=>'Create Staff','url'=>array('create')),
array('label'=>'Update Staff','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Staff','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Staff','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View Staff #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'first_name',
                'last_name',
		'email',
		'address',
		'city',
		'state',
		'zip_code',
		'phone',
		'fax',
		'photo',
		'photo_path',
		'is_active',
		'cdate',
		'mdate',
		'type',
		'country_id',
		'join_date',
),
)); ?>
