
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="row-fluid">
	<div class="span3">
	<?php echo $form->dropDownListRow($model, 'intake_id', CHtml::listData(Intake::model()->findAll(), 'id', 'name'), array('class' => 'span10', 'prompt' => '--Select--')); ?>
                
         </div>
        <div class="span3">   
		<?php 
                if(!Yii::app()->user->isGuest && User::isTrainer()){
                    $trainerId = Yii::app()->user->user_id;
                    $criteria = new CDbCriteria;
                    $criteria->condition = "staff_id=".$trainerId;
                    $unit = StaffUnitMapping::model()->findAll($criteria);
                }
                
                echo $form->dropDownListRow($model, 'unit_id', CHtml::listData($unit, 'unit.id', 'unit.name'), array('class' => 'span10', 'prompt' => '--Select--',)); ?>
        </div>
        
	<div class="span6">
            <label>&nbsp;</label>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Show Venue',
                        'htmlOptions'=>array('name'=>'search','value'=>'search'),
                        
		)); ?>
	</div>
</div>

<?php $this->endWidget(); ?>

