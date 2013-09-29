<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Student','url'=>array('index')),
	array('label'=>'Create Student','url'=>array('create')),
	array('label'=>'View Student','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Student','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update Student #'.$model->id;?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'userModel'=>$userModel,)); ?>