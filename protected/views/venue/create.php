<?php
$this->breadcrumbs=array(
	'Venues'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Venue','url'=>array('index')),
array('label'=>'Manage Venue','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create Venue';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>