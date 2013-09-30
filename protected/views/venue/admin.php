<?php
$this->breadcrumbs=array(
	'Venues'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Venue','url'=>array('index')),
array('label'=>'Create Venue','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('venue-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

    <div class="row-fluid">
	
            <?php Yii::app()->params['mod_title'] = 'Manage Venue';?><?php Yii::app()->params['mod_desc'] = 'You can Add/Edit/Delete Venue here'; ?>	    
	    <?php echo CHtml::link('<i class="icon-plus colorWhite"></i> Create','create',array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;	    <?php echo CHtml::link('<i class="icon-search"></i> Advanced Search','#',array('class'=>'search-button btn')); ?>	
    </div>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'venue-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type'=>'striped bordered condensed hover',
'columns'=>array(
		'id',
		'name',
		//'cdate',
		//'mdate',
//        array(
//                'class'=>'JToggleColumn',
//                'name'=>'is_active', // boolean model attribute (tinyint(1) with values 0 or 1)
//                'filter' => array('0' => 'No', '1' => 'Yes'), // filter
//                'labeltype'=>'image',
//                'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
//        ),
                    
    array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    
),
),
)); ?>
