<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	'Manage',
);\n";
?>

$this->menu=array(
array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index')),
array('label'=>'Create <?php echo $this->modelClass; ?>','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

    <div class="row-fluid">
	
            <?php echo "<?php Yii::app()->params['mod_title'] = 'Manage $this->modelClass';?><?php Yii::app()->params['mod_desc'] = 'You can Add/Edit/Delete $this->modelClass here'; ?>"; ?>
	    
	    <?php echo "<?php echo CHtml::link('<i class=\"icon-plus colorWhite\"></i> Create','create',array('class'=>'btn btn-success')); ?>&nbsp;&nbsp;"; ?>
	    <?php echo "<?php echo CHtml::link('<i class=\"icon-search\"></i> Advanced Search','#',array('class'=>'search-button btn')); ?>"; ?>
	
    </div>

<div class="search-form" style="display:none">
	<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type'=>'striped bordered condensed hover',
'columns'=>array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	if (++$count == 7) {
		echo "\t\t/*\n";
	}
        if ($column->name == 'is_active') {
        ?>
        array(
                'class'=>'JToggleColumn',
                'name'=>'is_active', // boolean model attribute (tinyint(1) with values 0 or 1)
                'filter' => array('0' => 'No', '1' => 'Yes'), // filter
                'labeltype'=>'image',
                'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
        ),
                    
    <?php
    }
    elseif($column->name == 'id'){
        echo "\t\t//'" . $column->name . "',\n";
    }
        else{
            echo "\t\t'" . $column->name . "',\n";
        }
	
}
if ($count >= 7) {
	echo "\t\t*/\n";
}
?>
array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    
),
),
)); ?>
