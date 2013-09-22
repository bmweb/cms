<?php
$this->breadcrumbs=array(
	'Units',
);

$this->menu=array(
array('label'=>'Create Unit','url'=>array('create')),
array('label'=>'Manage Unit','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'Units';?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
