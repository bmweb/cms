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
'rowCssClassExpression'=>'Attendance::isAttendanceDone($data->id)=="Done"?"success":""',

'columns'=>array(
		//'id',
                'date',
                array(
                    'name'=>'courseName',
                    'value'=>'$data->course->name',
                    'type'=>'raw',
                ),
                array(
                    'name'=>'intakeName',
                    'value'=>'$data->intake->name',
                    'type'=>'raw',
                ),
                array(
                    'name'=>'unitName',
                    'value'=>'$data->unit->name',
                    'type'=>'raw',
                ),
                array(
                    'name'=>'trainerName',
                    'value'=>'$data->trainer->fullname',
                    'type'=>'raw',
                ),
                array(
                    'name'=>'venueName',
                    'value'=>'$data->venue->name',
                    'type'=>'raw',
                ),
                array('name'=>'attendance',
                      'type'=>'text',
                      'value'=> 'Attendance::isAttendanceDone($data->id)',
                      //'htmlOptions'=>array('style' => 'text-align: right;'),
                    ),
		/*'course_id',
		'intake_id',
		'unit_id',
		'trainer_id',
		'venue_id',
		
		'date',
		'from_time',
		'to_time',
		'cdate',
		'mdate',
		*/
array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    'headerHtmlOptions' => array('style'=>'width:80px'),
    'template'=>'{view} {update} {delete} {attendance}',
    'buttons'=>array(
        'update'=>array(
        'label'=>'Update',
            'url'=>'Yii::app()->createUrl("classTimeTable/update", array("id"=>$data->id))',
            'icon'	=>  'pencil',
            'visible'=>'Attendance::isAttendanceDone($data->id)=="Done"?"0":"1"'
        ),
        'delete'=>array(
        'label'=>'Delete',
            'url'=>'Yii::app()->createUrl("classTimeTable/delete", array("id"=>$data->id))',
            'icon'	=>  'trash',
            'visible'=>'Attendance::isAttendanceDone($data->id)=="Done"?"0":"1"'
        ),
        'attendance'=>array(
            'label'=>'Add Attendance',
                'url'=>'Yii::app()->createUrl("attendance/create", array("id"=>$data->id,"intake"=>$data->intake_id,"unit"=>$data->unit_id))',
                'icon'	=>  'list-alt'
        )
    ),
    
),
),
)); ?>
