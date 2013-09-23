<?php
$this->breadcrumbs=array(
	'Students',
);

$this->menu=array(
array('label'=>'Create Student','url'=>array('create')),
array('label'=>'Manage Student','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'Students';?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
