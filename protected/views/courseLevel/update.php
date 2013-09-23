<?php
$this->breadcrumbs=array(
	'Course Levels'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CourseLevel','url'=>array('index')),
	array('label'=>'Create CourseLevel','url'=>array('create')),
	array('label'=>'View CourseLevel','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CourseLevel','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update CourseLevel #'.$model->id;?><?php echo $this->renderPartial('_form',array('model'=>$model)); ?>