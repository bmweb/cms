<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Course','url'=>array('index')),
array('label'=>'Manage Course','url'=>array('admin')),
);
?>
<div class="page-header">
    <h1>Create Course</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>