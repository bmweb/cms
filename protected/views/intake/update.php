<?php
$this->breadcrumbs=array(
	'Intakes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Intake','url'=>array('index')),
	array('label'=>'Create Intake','url'=>array('create')),
	array('label'=>'View Intake','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Intake','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update Intake #'.$model->id;?><?php echo $this->renderPartial('_form',array('model'=>$model)); ?>