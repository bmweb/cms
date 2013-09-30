<?php
$this->breadcrumbs=array(
	'Attendances'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Attendance','url'=>array('index')),
array('label'=>'Create Attendance','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('attendance-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

    <div class="row-fluid">
	
            <?php Yii::app()->params['mod_title'] = 'Manage Attendance';?><?php Yii::app()->params['mod_desc'] = 'You can Add/Edit/Delete Attendance here'; ?>	    
	    <?php echo CHtml::link('<i class="icon-plus colorWhite"></i> Create','create',array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;	    <?php echo CHtml::link('<i class="icon-search"></i> Advanced Search','#',array('class'=>'search-button btn')); ?>	
    </div>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'attendance-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type'=>'striped bordered condensed hover',
'columns'=>array(
		//'id',
		'class_time_table_id',
		'student_id',
		'date',
		'attendance_detail',
		'cdate',
		/*
		'mdate',
		*/
array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    
),
),
)); ?>
