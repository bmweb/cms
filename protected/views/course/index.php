<?php
$this->breadcrumbs=array(
	'Courses',
);

$this->menu=array(
array('label'=>'Create Course','url'=>array('create')),
array('label'=>'Manage Course','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'Courses';?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
