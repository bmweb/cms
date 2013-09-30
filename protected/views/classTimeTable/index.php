<?php
$this->breadcrumbs=array(
	'Class Time Tables',
);

$this->menu=array(
array('label'=>'Create ClassTimeTable','url'=>array('create')),
array('label'=>'Manage ClassTimeTable','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'Class Time Tables';?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
