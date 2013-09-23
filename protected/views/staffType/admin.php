<?php
$this->breadcrumbs=array(
	'Staff Types'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List StaffType','url'=>array('index')),
array('label'=>'Create StaffType','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('staff-type-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

    <div class="row-fluid">
	
            <?php Yii::app()->params['mod_title'] = 'Manage StaffType';?><?php Yii::app()->params['mod_desc'] = 'You can Add/Edit/Delete StaffType here'; ?>	    
	    <?php echo CHtml::link('<i class="icon-plus colorWhite"></i> Create','create',array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;	    <?php echo CHtml::link('<i class="icon-search"></i> Advanced Search','#',array('class'=>'search-button btn')); ?>	
    </div>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'staff-type-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type'=>'striped bordered condensed hover',
'columns'=>array(
		//'id',
		'title',
array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    
),
),
)); ?>
