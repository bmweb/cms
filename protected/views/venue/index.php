<?php
$this->breadcrumbs=array(
	'Venues',
);

$this->menu=array(
array('label'=>'Create Venue','url'=>array('create')),
array('label'=>'Manage Venue','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'Venues';?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
