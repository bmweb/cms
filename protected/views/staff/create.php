<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Staff','url'=>array('index')),
array('label'=>'Manage Staff','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create Staff';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model, 'userModel'=>$userModel)); ?>