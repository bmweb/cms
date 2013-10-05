<?php
$this->breadcrumbs=array(
	'Results'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Result','url'=>array('index')),
array('label'=>'Create Result','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('result-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

    <div class="row-fluid">
	
            <?php Yii::app()->params['mod_title'] = 'Manage Result';?><?php Yii::app()->params['mod_desc'] = 'You can Add/Edit/Delete Result here'; ?>	    
	    <?php echo CHtml::link('<i class="icon-plus colorWhite"></i> Create','create',array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;	    <?php //echo CHtml::link('<i class="icon-search"></i> Advanced Search','#',array('class'=>'search-button btn')); ?>	
    </div>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'result-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type'=>'striped bordered condensed hover',
'columns'=>array(
		//'id',
		//'student_id',
                array(
                    'name'=>'unitName',
                    'value'=>'$data->unit->name',
                    'type'=>'raw',
                ),
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
                
		/*'internal_marks',
		
		'external_marks',
		'cdate',
		'mdate',
		*/
array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    
),
),
)); ?>
