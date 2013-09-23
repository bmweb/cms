<?php
$this->breadcrumbs=array(
	'Staff Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List StaffType','url'=>array('index')),
array('label'=>'Manage StaffType','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create StaffType';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>