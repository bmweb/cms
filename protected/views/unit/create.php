<?php
$this->breadcrumbs=array(
	'Units'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Unit','url'=>array('index')),
array('label'=>'Manage Unit','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create Unit';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>