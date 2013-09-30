<?php
$this->breadcrumbs=array(
	'Venues'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Venue','url'=>array('index')),
	array('label'=>'Create Venue','url'=>array('create')),
	array('label'=>'View Venue','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Venue','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update Venue #'.$model->id;?><?php echo $this->renderPartial('_form',array('model'=>$model)); ?>