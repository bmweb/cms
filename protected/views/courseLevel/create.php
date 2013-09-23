<?php
$this->breadcrumbs=array(
	'Course Levels'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CourseLevel','url'=>array('index')),
array('label'=>'Manage CourseLevel','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Create CourseLevel';?>	    
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>