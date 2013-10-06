<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->first_name,
);

?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/js/uploadify/uploadify.css">
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/uploadify/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript">




    $(function() {
        var sid = "<?php echo $model->id; ?>";

        $('#file_uploadd').uploadify({
            'formData': {'sid': sid},
            'swf': '<?php echo Yii::app()->baseUrl ?>/js/uploadify/uploadify.swf',
            'uploader': '<?php echo $this->createUrl('staff/uploadprofile') ?>',
            'cancelImg': '<?php echo Yii::app()->baseUrl ?>/js/uploadify/uploadify-cancel.png',
            'auto': true,
            'multi': false,
            'fileExt': '*.jpg;*.jpeg;*.png',
            'onUploadComplete': function(file, data) {

                var fileUrl = "<?php echo Yii::app()->baseUrl; ?>/uploads/staff/thumb-" + sid + file.name;
                //     alert(fileUrl);
                //  alet("<?php echo Yii::app()->baseUrl; ?>/uploads/student/"+sid+file.name);
                $('#profileImage').attr('src', fileUrl);

            }
        });
    });



</script>
<?php Yii::app()->params['mod_title'] = 'View Staff #'.$model->id;?>
    <div class="row-fluid borderinView">
    <div class="span3">
        <div class="well">
            <img id="profileImage" src="<?php echo Yii::app()->baseUrl; ?>/uploads/staff/thumb-<?php echo ($model->photo != "") ? $model->photo : "usericon1.jpg"; ?>" />
  
       </div>  
      
        <?php
            //if (User::isStaff() || User::isAdmin()) {
                ?>
                <input type="file" name="file_uploadd" id="file_uploadd" />

            <?php //} ?>
	
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