<?php
$this->breadcrumbs=array(
	'Courses'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Course','url'=>array('index')),
array('label'=>'Create Course','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('course-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

    <div class="row-fluid">
	
            <?php Yii::app()->params['mod_title'] = 'Manage Course';?><?php Yii::app()->params['mod_desc'] = 'You can Add/Edit/Delete Course here'; ?>	    
	    <?php echo CHtml::link('<i class="icon-plus colorWhite"></i> Create','create',array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;	    <?php echo CHtml::link('<i class="icon-search"></i> Advanced Search','#',array('class'=>'search-button btn')); ?>	
    </div>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'course-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type'=>'striped bordered condensed hover',
'columns'=>array(
		//'id',
		'name',
		'code',
		'duration',
		'duration_type',
		'cdate',
		/*
		'mdate',
        array(
                'class'=>'JToggleColumn',
                'name'=>'is_active', // boolean model attribute (tinyint(1) with values 0 or 1)
                'filter' => array('0' => 'No', '1' => 'Yes'), // filter
                'labeltype'=>'image',
                'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
        ),
                    
    		'course_level_id',
		'course_field_id',
		*/
array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    
),
),
)); ?>
