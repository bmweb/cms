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
                <div id="yw0_tab_7" class="tab-pane fade">
                    <div class="span9">
                        <legend class="serif colorCyan">Fees</legend>
                    </div>
                    <div>
                        <a href="#" class="addFee btn btn-info" data-toggle="modal" data-target="#addFeeModal">Add Fee</a>
                    </div>
                     <?php
                    if (!empty($studentCourseFeeMaps)) {
                        
                            ?>
                            <table class="items table table-striped table-bordered">   
                                
                                <tr>
                                    <th>Course</th>
                                    <th>Intake</th>
                                    <th>Course Fee</th>
                                    <th>Paid Fee</th>
                                    <th></th>
                                </tr>
                                  <?php foreach ($studentCourseFeeMaps as $studentfee) { ?>
                                <tr>
                                  
                                        <td><?php echo $studentfee->studentCourse->course->name; ?></td>
                                        <td><?php echo $studentfee->studentCourse->intake->name; ?></td>
                                        <td><?php echo Yii::app()->locale->getCurrencySymbol('AUD').$studentfee->studentCourse->course_fee; ?></td>
                                        <td><?php echo Yii::app()->locale->getCurrencySymbol('AUD').$studentfee->paid_fee; ?></td>
                                        
                                        <td>
                                            <a href="#"  data-toggle="modal" data-target="#viewFeeDetailModel<?php echo $studentfee->student_course_id; ?>" class="viewFeeDetail<?php echo $studentfee->student_course_id; ?>" alt="view fee detail">
                                            <i class="icon-eye-open"></i></a>
                                        </td>
                                </tr>  
                                <!--  view fee popup model-->
                                <tr>
                                    <td colspan="5">
                                <div id="viewFeeDetailModel<?php echo $studentfee->student_course_id; ?>" class="modal hide fade">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h3>Fee Detail</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $this->renderPartial('//student/courseFeeDetail', array('id'=>$studentfee->student_course_id)); ?>
                                    </div>
                                </div>
                                    </td>
                                </tr>
                                 <?php } ?>
                            </table>
                            <?php
                        
                    }
                    
                      else{
                    ?>
                    <div class="alert marginTop20">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      No Record Found.
                    </div>  
                    <?php  } ?>
                </div>
             </div>
        </div>
    </div>
</div> 
<!--  add fee popup model-->
<div id="addFeeModel" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Add Fee</h3>
    </div>
    <div class="modal-body">
        <?php echo $this->renderPartial('//student/addFee',array('id'=>$model->id)); ?>
    </div>
    
</div>
<script>

$('a.addFee').click(function(e) {
            e.preventDefault();
            console.log('I clicked');

            $('#addFeeModel').modal('show');
        });
</script>
    
    
    