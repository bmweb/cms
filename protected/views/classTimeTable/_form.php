<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'class-time-table-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
    
                <?php echo $form->dropDownListRow($model, 'intake_id', CHtml::listData(Intake::model()->findAll(), 'id', 'name'), array('class' => 'span5', 'prompt' => '--Select--')); ?>
                
        	<?php echo $form->dropDownListRow($model, 'course_id', CHtml::listData(Course::model()->findAll(), 'id', 'name'), array('class' => 'span5', 'prompt' => '--Select--',
                    'ajax'=>array(
                                    'type'=>'POST',
                                    'data'=>array('course_id'=>"js:this.value"),
                                    'url'=>CController::createUrl('unit/unitByCourse'),
                                    'update'=>'#'.CHtml::activeId($model,'unit_id'), 
                                )
                    )); ?>

                <?php echo $form->dropDownListRow($model, 'unit_id', array(), array('class' => 'span5', 'prompt' => '--Select--',
                    'ajax'=>array(
                                    'type'=>'POST',
                                    'data'=>array('unit_id'=>"js:this.value"),
                                    'url'=>CController::createUrl('staff/trainerByUnit'),
                                    'update'=>'#'.CHtml::activeId($model,'trainer_id'), 
                                )
                    )); ?>
        
        	<?php echo $form->dropDownListRow($model, 'trainer_id',  array(), array('class' => 'span5', 'prompt' => '--Select--')); ?>
               
                <?php echo $form->dropDownListRow($model, 'venue_id', CHtml::listData(Venue::model()->findAll(), 'id', 'name'), array('class' => 'span5', 'prompt' => '--Select--')); ?>
                
        	<?php echo $form->datePickerRow($model, 'date', array('class' => 'span5',
                    'options'=>array(
                        'format'=>'yyyy-mm-dd',
                        'language'=>'en',
                        'todayHighlight'=>true,
                        'autoclose'=>true
                )

                    )); ?>

                <?php echo $form->labelEx($model, 'from_time'); ?> 
		<?php 
                $this->widget('CJuiDateTimePicker', array(
                                    'language' => '',
                                    'model' => $model, // Model object
                                    'attribute' => 'from_time',
                                    'mode' => 'time',
                                    'options' => array(
                                          // 'dateFormat' => Yii::app()->mylocale->dateFormat,
                                    ),
                                    'htmlOptions' => array(
                                            'placeholder' => 'from Time',
                                            'class'=>'input' . ( $model->getError('from_time')  ? ' error' : '')
                                    ),
                            ));
                
                 ?>
                <?php echo $form->error($model, 'from_time'); ?>

        	<?php echo $form->labelEx($model, 'from_time'); ?> 
		<?php 
                $this->widget('CJuiDateTimePicker', array(
                                    'language' => '',
                                    'model' => $model, // Model object
                                    'attribute' => 'to_time',
                                    'mode' => 'time',
                                    'options' => array(
                                          // 'dateFormat' => Yii::app()->mylocale->dateFormat,
                                    ),
                                    'htmlOptions' => array(
                                            'placeholder' => 'To Time',
                                            'class'=>'input' . ( $model->getError('to_time')  ? ' error' : '')
                                    ),
                            ));
                
                 ?>
                <?php echo $form->error($model, 'to_time'); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
