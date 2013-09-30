<?php
$this->breadcrumbs=array(
	'Class Time Tables'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ClassTimeTable','url'=>array('index')),
	array('label'=>'Create ClassTimeTable','url'=>array('create')),
	array('label'=>'View ClassTimeTable','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ClassTimeTable','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update ClassTimeTable #'.$model->id;?><?php echo $this->renderPartial('_form',array('model'=>$model)); ?>