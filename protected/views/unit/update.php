<?php
$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Unit','url'=>array('index')),
	array('label'=>'Create Unit','url'=>array('create')),
	array('label'=>'View Unit','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Unit','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update Unit #'.$model->id;?><?php echo $this->renderPartial('_form',array('model'=>$model)); ?>