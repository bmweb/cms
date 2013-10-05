<?php
$this->breadcrumbs=array(
	'Results'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Result','url'=>array('index')),
	array('label'=>'Create Result','url'=>array('create')),
	array('label'=>'View Result','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Result','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update Result #'.$model->id;?>
    <?php echo $this->renderPartial('_form',array('model'=>$model,'students'=>$students,'action'=>'update')); ?>