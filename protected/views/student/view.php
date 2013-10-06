<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.blockUI.js'); ?>
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
                <li class="active" style="float: none;"><a data-toggle="tab" href="#general">General Details</a></li>
                <li class="" style="float: none;"><a data-toggle="tab" href="#courses">Courses</a></li>
                <li class="" style="float: none;"><a data-toggle="tab" href="#attendance">Attendance </a></li>
                <li class="" style="float: none;"><a data-toggle="tab" href="#results">Results</a></li>
                <li class="" style="float: none;"><a data-toggle="tab" href="#fees">Fees</a></li>
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
                <div id="general" class="tab-pane fade active in">
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
                <div id="courses" class="tab-pane fade">
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
                <div id="attendance" class="tab-pane fade">
                    <legend class="serif colorCyan">Attendance</legend>
                    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                            'action'=>Yii::app()->createUrl($this->route."/".$model->id),
                            'id'=>'studentAttendanceSearch',
                           // 'method'=>'get',
                    )); ?>
                    <input type="hidden" name="student_id" value="<?php echo $model->id; ?>">
                    <div  class="well" width="100%">
                    <table>
                        <tr>
                            <td>
                               Course 
                            </td>
                            <td>
                                <select name="course_id" id="studentCourse" class="marginBottom0">
                                    <option value=''>Select</option>
                                    <?php if(isset($studentCourse) && !empty($studentCourse)){ 
                                        foreach ($studentCourse as $courseData){ ?>
                                        <option value="<?php echo $courseData->course_id; ?>"><?php echo $courseData->course->name; ?></option>
                                     <?php   }
                                    } ?>
                                </select>
                            </td>
                            <td>
                                Unit
                            </td>
                            <td>
                                <select name="unit_id"  class="marginBottom0" id="studentCourseUnit">
                                    <option value=''>Select</option>
                                </select>    
                            </td>
                            <td>
                                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                    'buttonType' => 'submit',
                                    'type'=>'primary',
                                    'label'=>'Show',
                                    "htmlOptions"=>array("class"=>'marginBottom10'),
                            )); ?>
                            </td>
                        </tr>
                    </table>
                    

                    <?php $this->endWidget(); ?>
                    </div>
                    <div id="studentAttendances">
                        <div class="alert marginLeft0">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            No Record Found. Or select the course and unit to show attendance.
                        </div>
                        
                    </div>

                </div>
                <div id="results" class="tab-pane fade">
                    <legend class="serif colorCyan">Results</legend>
                    <div class="well" width="100%">
                        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                            'action'=>Yii::app()->createUrl($this->route."/".$model->id),
                            'id'=>'studentResultSearch',
                           // 'method'=>'get',
                    )); ?>
                    <input type="hidden" name="student_id" value="<?php echo $model->id; ?>">
                    <table>
                        <tr>
                            <td>
                               Intake 
                            </td>
                            <td>
                                <select name="intake_id" id="studentResultIntake" class="marginBottom0">
                                    <option value=''>Select</option>
                                    <?php if(isset($intakes) && !empty($intakes)){ 
                                        foreach ($intakes as $intake){ ?>
                                        <option value="<?php echo $intake->id; ?>"><?php echo $intake->name; ?></option>
                                     <?php   }
                                    } ?>
                                </select>
                            </td>
                            <td>
                               Course 
                            </td>
                            <td>
                                <select name="course_id" id="studentCourse" class="marginBottom0">
                                    <option value=''>Select</option>
                                    <?php if(isset($studentCourse) && !empty($studentCourse)){ 
                                        foreach ($studentCourse as $courseData){ ?>
                                        <option value="<?php echo $courseData->course_id; ?>"><?php echo $courseData->course->name; ?></option>
                                     <?php   }
                                    } ?>
                                </select>
                            </td>
                            
                            <td>
                                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                    'buttonType' => 'submit',
                                    'type'=>'primary',
                                    'label'=>'Show',
                                    "htmlOptions"=>array("class"=>'marginBottom10'),
                            )); ?>
                            </td>
                        </tr>
                    </table>
                    <?php $this->endWidget(); ?>
                    </div>
                    <div id="studentResults">
                        <div class="alert marginLeft0">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            No Record Found. Or select the intake and course to show result.
                        </div> 
                    </div>
                    
                </div>
                <div id="fees" class="tab-pane fade">
                    <div class="span9">
                        <legend class="serif colorCyan">Fees</legend>
                    </div>
                    <?php if(!Yii::app()->user->isGuest && !User::isStudent() && !User::isTrainer()){ ?>
                        <div>
                            <a href="#" class="addFee btn btn-info" data-toggle="modal" data-target="#addFeeModal">Add Fee</a>
                        </div>
                    <?php }else{ ?>
                    <div>&nbsp;</div>
                  <?php  } ?>
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
                                        <td><?php echo "Rs".$studentfee->studentCourse->course_fee; ?></td>
                                        <td><?php echo "Rs".$studentfee->paid_fee; ?></td>
                                        
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
                    <div class="alert marginLeft0  span11">
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
        
$(function() {
    $("#studentCourse").change(function(){
        var student_course_id = $(this).val();
       $.ajax({
                'type': 'POST',
                'data': {course_id:student_course_id},
                'url': '<?php echo Yii::app()->createUrl('unit/unitByCourse') ?>',
                'success': function(data) {
                    $("#studentCourseUnit").html(data);

                }
            });
            return false;
    });
    $('#studentAttendanceSearch').submit(function() {
        studentAttendances();
        return false;
    });
    $('#studentResultSearch').submit(function() {
        studentResult();
        return false;
    });
    //studentResultAll();
});
function studentAttendances(){
       
      
      $.ajax({
                'type': 'POST',
                'data': $('#studentAttendanceSearch').serialize(),
                'url': '<?php echo Yii::app()->createUrl('student/studentAttendance') ?>',
                'beforeSend': function(){
                  //  $('div#studentAttendances').block();
                },
                'success': function(data) {
                    $("#studentAttendances").html(data);
                  //  $('div#studentAttendances').unblock(); 
                   
                }
            });
            
  }
  function studentResultAll(){
       
      
      $.ajax({
                'type': 'POST',
                'data': {student_id:<?php echo $model->id; ?>},
                'url': '<?php echo Yii::app()->createUrl('student/studentResult') ?>',
                'success': function(data) {
                    $("#studentResults").html(data);

                }
            });
            
  }
  function studentResult(){
      $.ajax({
                'type': 'POST',
                'data': $('#studentResultSearch').serialize(),
                'url': '<?php echo Yii::app()->createUrl('student/studentResult') ?>',
                'beforeSend': function(){
                    //$('div#studentResults').block();
                },
                'success': function(data) {
                    $("#studentResults").html(data);
                    //$('div#studentResults').unblock(); 
                   
                }
            });
            
  }
</script>
    
    
    