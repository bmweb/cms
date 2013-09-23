<?php
$this->breadcrumbs=array(
	'Staff Types',
);

$this->menu=array(
array('label'=>'Create StaffType','url'=>array('create')),
array('label'=>'Manage StaffType','url'=>array('admin')),
);
?>


<?php Yii::app()->params['mod_title'] = 'Staff Types';?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
