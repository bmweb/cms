<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id,
);

?>


<?php Yii::app()->params['mod_title'] = 'View Student #'.$model->id;?>
 <div class="row-fluid borderinView">
    <div class="span3">
        <div class="well">
            <img id="profileImage" src="<?php echo Yii::app()->baseUrl; ?>/uploads/student/thumb-<?php echo ($model->photo != "") ? $model->photo : "usericon1.jpg"; ?>" />
  
       </div>  
      
<!--          <input type="file" name="file_uploadd" id="file_uploadd" />-->
	
        <br/>
        <br/>
        <div class="">

            <ul id="yw1" class="nav nav-tabs nav-stacked">
                <li class="active" style="float: none;"><a data-toggle="tab" href="#yw0_tab_1">General Details</a></li>
                <li class="" style="float: none;"><a data-toggle="tab" href="#yw0_tab_2">Courses</a></li>
                <li class="" style="float: none;"><a data-toggle="tab" href="#yw0_tab_5">Attendance </a></li>
                <li class="" style="float: none;"><a data-toggle="tab" href="#yw0_tab_6">Results</a></li>
                <li class="" style="float: none;"><a data-toggle="tab" href="#yw0_tab_7">Fees</a></li>
            </ul>
        </div>
    </div>
    <div class="span9">
        <div class="">
            <table class="items table table-striped table-bordered">
                <tr>
                    <td colspan="4" style="background: white;"><legend class="serif colorCyan"><?php echo $model->fullname; ?></legend></td>
                </tr>

                <tr>
                    <td><b><?php echo $model->getAttributeLabel('id'); ?></b></td>
                    <td><?php echo $model->id; ?></td>
                    <td><b><?php echo $model->getAttributeLabel('email'); ?></b></td>
                    <td><?php echo $model->email; ?></td>
                </tr>
                <tr>
                    <td><b><?php echo $model->getAttributeLabel('first_name'); ?></b></td>
                    <td><?php echo $model->first_name; ?></td>
                    <td><b><?php echo $model->getAttributeLabel('last_name'); ?></b></td>
                    <td><?php echo $model->last_name; ?></td>
                </tr>
                <tr>
                    <td><b><?php echo $model->getAttributeLabel('sex'); ?></b></td>
                    <td><?php echo $model->fullsex; ?></td>
                    <td><b><?php echo $model->getAttributeLabel('dob'); ?></b></td>
                    <td><?php echo $model->dob; ?></td>
                </tr>
                <tr>
                    <td><b><?php echo $model->getAttributeLabel('phone'); ?></b></td>
                    <td><?php echo $model->phone; ?></td>
                    
                    <td colspan="2"></td>

                </tr>
            </table>
        </div>
        <br/>
        <div>

            <div class="tab-content">
                <div id="yw0_tab_1" class="tab-pane fade active in">
                    <legend class="serif colorCyan">Contact Details</legend>
                    <table class="items table table-striped table-bordered">
                        <tr>
                            <td><b><?php echo $model->getAttributeLabel('address1'); ?></b></td>
                            <td><?php echo $model->address1; ?></td>
                            <td><b><?php echo $model->getAttributeLabel('address2'); ?></b></td>
                            <td><?php echo $model->address2; ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo $model->getAttributeLabel('city'); ?></b></td>
                            <td><?php echo $model->city; ?></td>
                            <td><b><?php echo $model->getAttributeLabel('state'); ?></b></td>
                            <td><?php echo $model->state; ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo $model->getAttributeLabel('country_id'); ?></b></td>
                            <td><?php echo $model->country->name; ?></td>
                            <td><b><?php echo $model->getAttributeLabel('zip'); ?></b></td>
                            <td><?php echo $model->zip; ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo $model->getAttributeLabel('phone'); ?></b></td>
                            <td><?php echo $model->phone; ?></td>
                            <td><b><?php echo $model->getAttributeLabel('fax'); ?></b></td>
                            <td><?php echo $model->fax; ?></td>
                        </tr>
                     </table>
                </div>
                <div id="yw0_tab_2" class="tab-pane fade">
                    <legend class="serif colorCyan">Courses</legend>
                    <?php 
                    
                    $this->widget('bootstrap.widgets.TbGridView', array(
                        'id' => 'ecoe-grid',
                        'dataProvider' => $courses,
                        'template' => '{items}{summary}{pager}',
                        'type' => 'striped bordered condensed',
                        'summaryText'=>'',
                        'beforeAjaxUpdate' => 'function(id,options){ $(".grid-view").block()}',
                        'columns' => array(
                            'course.name',
                            'intake.name',
                            'intake.code',
                        ),
                    )); 
                    ?>

                </div>
             </div>
        </div>
    </div>
</div>   
    
    
    