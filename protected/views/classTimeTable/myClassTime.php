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
<?php echo $this->renderPartial('_search', array('model'=>$model)); ?>
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
    }else{ ?>
        <div class="alert marginLeft0">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Please select the intake, course and unit to show class venue.
        </div>
   <?php } ?>
</div>
