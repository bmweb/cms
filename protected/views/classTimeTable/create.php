<?php
$this->breadcrumbs=array(
	'Class Time Tables'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ClassTimeTable','url'=>array('index')),
array('label'=>'Manage ClassTimeTable','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create ClassTimeTable';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>