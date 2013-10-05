<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="row-fluid">
	<div class="span3">
	<?php echo $form->dropDownListRow($model, 'intake_id', CHtml::listData(Intake::model()->findAll(), 'id', 'name'), array('class' => 'span10', 'prompt' => '--Select--')); ?>
                
         </div>
        <div class="span3">   
		<?php echo $form->dropDownListRow($model, 'course_id', CHtml::listData(Course::model()->findAll(), 'id', 'name'), array('class' => 'span10', 'prompt' => '--Select--',
                    'ajax'=>array(
                                    'type'=>'POST',
                                    'data'=>array('course_id'=>"js:this.value"),
                                    'url'=>CController::createUrl('unit/unitByCourse'),
                                    'update'=>'#'.CHtml::activeId($model,'unit_id'), 
                                )
                    )); ?>
</div>
        <div class="span3">
		<?php echo $form->dropDownListRow($model, 'unit_id', array(), array('class' => 'span10', 'prompt' => '--Select--',)); ?>
</div>
      

	<div class="span3">
            <label>&nbsp;</label>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Show Students',
                        'htmlOptions'=>array('name'=>'search','value'=>'search'),
                        
		)); ?>
	</div>
</div>

<?php $this->endWidget(); ?>
