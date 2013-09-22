<?php
$this->breadcrumbs=array(
	'Units'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Unit','url'=>array('index')),
array('label'=>'Create Unit','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('unit-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

    <div class="row-fluid">
	
            <?php Yii::app()->params['mod_title'] = 'Manage Unit';?><?php Yii::app()->params['mod_desc'] = 'You can Add/Edit/Delete Unit here'; ?>	    
	    <?php echo CHtml::link('<i class="icon-plus colorWhite"></i> Create','create',array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;	    <?php echo CHtml::link('<i class="icon-search"></i> Advanced Search','#',array('class'=>'search-button btn')); ?>	
    </div>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'unit-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type'=>'striped bordered condensed hover',
'columns'=>array(
		//'id',
		'name',
		'code',
		'course_id',
		'cdate',
		'mdate',
		/*
        array(
                'class'=>'JToggleColumn',
                'name'=>'is_active', // boolean model attribute (tinyint(1) with values 0 or 1)
                'filter' => array('0' => 'No', '1' => 'Yes'), // filter
                'labeltype'=>'image',
                'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
        ),
                    
    		*/
array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    
),
),
)); ?>
