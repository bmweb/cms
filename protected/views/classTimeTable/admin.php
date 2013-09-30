<?php
$this->breadcrumbs=array(
	'Class Time Tables'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List ClassTimeTable','url'=>array('index')),
array('label'=>'Create ClassTimeTable','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('class-time-table-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

    <div class="row-fluid">
	
            <?php Yii::app()->params['mod_title'] = 'Manage ClassTimeTable';?><?php Yii::app()->params['mod_desc'] = 'You can Add/Edit/Delete ClassTimeTable here'; ?>	    
	    <?php echo CHtml::link('<i class="icon-plus colorWhite"></i> Create','create',array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;	    <?php echo CHtml::link('<i class="icon-search"></i> Advanced Search','#',array('class'=>'search-button btn')); ?>	
    </div>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'class-time-table-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type'=>'striped bordered condensed hover',
'columns'=>array(
		//'id',
		'course_id',
		'intake_id',
		'unit_id',
		'trainer_id',
		'venue_id',
		/*
		'date',
		'from_time',
		'to_time',
		'cdate',
		'mdate',
		*/
array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    
),
),
)); ?>
