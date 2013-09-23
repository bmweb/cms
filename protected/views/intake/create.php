<?php
$this->breadcrumbs=array(
	'Intakes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Intake','url'=>array('index')),
array('label'=>'Manage Intake','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create Intake';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>