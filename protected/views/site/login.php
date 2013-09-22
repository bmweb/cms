<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }

    </style>


 <?php
  $baseUrl = Yii::app()->baseUrl;
  $cs = Yii::app()->getClientScript();

  $cs->registerCssFile($baseUrl.'/css/form.css');
?>







<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>



	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	    'id'=>'verticalForm',
		'enableAjaxValidation'=>false,
	    'enableClientValidation'=>true,
	    'focus'=>array($model,'username'),
	    'htmlOptions'=>array('class'=>'form-signin'),
	)); ?>
  <div class="">
			<?php
				foreach(Yii::app()->user->getFlashes() as $key => $message) {
					echo '<div class="alert-message ' . $key . '">'.
					'<p>'.$message.'</p>'."</div>\n";
				}
			?>
        </div>
      <h3>Login to Your Account</h3>
	<div class="input-prepend" title="Username">
		 				<span class="add-on"><i class="icon-user"></i></span>
							<?php echo $form->textField($model,'username',array('class'=>'input-large span3','placeholder'=>"Type Email","style"=>"font-size: 12px !important;")); ?>
							<?php echo $form->error($model,'username',array("style"=>"font-size: 12px !important;")); ?>


							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="icon-lock"></i></span>

		<?php echo $form->passwordField($model,'password',array('class'=>'input-large span3','placeholder'=>"Type Password","style"=>"font-size: 12px !important;")); ?>
		<?php echo $form->error($model,'password',array("style"=>"font-size: 12px !important;")); ?>
  
							</div>
	<?php //echo $form->checkboxRow($model, 'rememberMe'); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login', 'type'=>'primary')); ?>
	<br/><br/>
	<p>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/forgotpassword">Forgot Password</a>
	</p>
        <?php $this->endWidget(); ?>

