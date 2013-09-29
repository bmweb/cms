<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->first_name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Staff','url'=>array('index')),
	array('label'=>'Create Staff','url'=>array('create')),
	array('label'=>'View Staff','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Staff','url'=>array('admin')),
	);
	?>
       
<?php Yii::app()->params['mod_title'] = 'Update Staff #'.$model->id;?>
    <?php echo $this->renderPartial('_form',array('model'=>$model,'userModel'=>$userModel,)); ?>