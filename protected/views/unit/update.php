<?php
$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Unit','url'=>array('index')),
	array('label'=>'Create Unit','url'=>array('create')),
	array('label'=>'View Unit','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Unit','url'=>array('admin')),
	);
	?>
        <div class="page-header">
            <h1>Update Unit <?php echo $model->id; ?></h1>
        </div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>