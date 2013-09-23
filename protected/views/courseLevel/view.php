<?php
$this->breadcrumbs=array(
	'Course Levels'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List CourseLevel','url'=>array('index')),
array('label'=>'Create CourseLevel','url'=>array('create')),
array('label'=>'Update CourseLevel','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete CourseLevel','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CourseLevel','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'View CourseLevel #'.$model->id;?><?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'cdate',
		'mdate',
),
)); ?>
