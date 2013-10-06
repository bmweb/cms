<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->first_name,
);

?>


<?php Yii::app()->params['mod_title'] = 'View Staff #'.$model->id;?>
    <div class="row-fluid borderinView">
    <div class="span3">
        <div class="well">
            <img id="profileImage" src="<?php echo Yii::app()->baseUrl; ?>/uploads/staff/thumb-<?php echo ($model->photo != "") ? $model->photo : "usericon1.jpg"; ?>" />
  
       </div>  
      
<!--          <input type="file" name="file_uploadd" id="file_uploadd" />-->
	
        <br/>
        <br/>
        
    </div>
    <div class="span9">
        <div class="">
            <table class="items table table-striped table-bordered">
                <tr>
                    <td colspan="4" style="background: white;"><legend class="serif colorCyan"><?php echo $model->fullname; ?> &nbsp;&nbsp;&nbsp; <?php echo "(".$model->staffType->title.")"; ?></legend> </td>
                </tr>

                <tr>
                    <td><b><?php echo $model->getAttributeLabel('first_name'); ?></b></td>
                    <td><?php echo $model->first_name; ?></td>
                    <td><b><?php echo $model->getAttributeLabel('last_name'); ?></b></td>
                    <td><?php echo $model->last_name; ?></td>
                </tr>
                
                <tr>
                    <td><b><?php echo $model->getAttributeLabel('email'); ?></b></td>
                    <td><?php echo $model->email; ?></td>
                    <td><b><?php echo $model->getAttributeLabel('phone'); ?></b></td>
                    <td><?php echo $model->phone; ?></td>
                </tr>
                <tr>
                    <td><b><?php echo $model->getAttributeLabel('sex'); ?></b></td>
                    <td><?php echo $model->fullsex; ?></td>
                    <td><b><?php echo $model->getAttributeLabel('join_date'); ?></b></td>
                    <td><?php echo $model->join_date; ?></td>
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
                            <td><b><?php echo $model->getAttributeLabel('address'); ?></b></td>
                            <td colspan="3"><?php echo $model->address; ?></td>
                            
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
                            <td><b><?php echo $model->getAttributeLabel('zip_code'); ?></b></td>
                            <td><?php echo $model->zip_code; ?></td>
                        </tr>
                        <tr>
                            <td><b><?php echo $model->getAttributeLabel('phone'); ?></b></td>
                            <td><?php echo $model->phone; ?></td>
                            <td><b><?php echo $model->getAttributeLabel('fax'); ?></b></td>
                            <td><?php echo $model->fax; ?></td>
                        </tr>
                     </table>
                </div>
                
             </div>
        </div>
    </div>
</div> 