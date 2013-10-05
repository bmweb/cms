<?php
$this->breadcrumbs=array(
	'Results'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Result','url'=>array('index')),
array('label'=>'Manage Result','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create Result';?>
<?php echo $this->renderPartial('_search', array('model'=>$model)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'students'=>$students,'action'=>'create')); ?>