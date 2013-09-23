<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Course','url'=>array('index')),
array('label'=>'Manage Course','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create Course';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>