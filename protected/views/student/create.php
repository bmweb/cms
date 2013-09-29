<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Student','url'=>array('index')),
array('label'=>'Manage Student','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create Student';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model, 'userModel'=>$userModel)); ?>