<?php
$this->breadcrumbs=array(
	'Intakes',
);

$this->menu=array(
array('label'=>'Create Intake','url'=>array('create')),
array('label'=>'Manage Intake','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'Intakes';?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
