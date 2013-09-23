<?php
$this->breadcrumbs=array(
	'Staff Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List StaffType','url'=>array('index')),
	array('label'=>'Create StaffType','url'=>array('create')),
	array('label'=>'View StaffType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage StaffType','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update StaffType #'.$model->id;?><?php echo $this->renderPartial('_form',array('model'=>$model)); ?>