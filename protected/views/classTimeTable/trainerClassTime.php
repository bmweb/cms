<?php
$this->breadcrumbs=array(
	'Results'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Result','url'=>array('index')),
array('label'=>'Manage Result','url'=>array('admin')),
);
?>

<?php Yii::app()->params['mod_title'] = 'Class Vanue';?>
<div class="well">
    <?php echo $this->renderPartial('_trainerSearch', array('model'=>$model)); ?>
</div>
<div class="row">
    <?php 
    if($dataProvider){
    $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
     'emptyText'=>'<div class="alert marginLeft0">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Sorry no record found.
        </div>'   
    )); 
    } ?>
</div>
