<?php
$this->breadcrumbs=array(
	'Course Levels',
);

$this->menu=array(
array('label'=>'Create CourseLevel','url'=>array('create')),
array('label'=>'Manage CourseLevel','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'Course Levels';?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
