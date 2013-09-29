<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
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
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
    }

</style>

<div >
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'forgotpassword-form',
	'enableClientValidation' => true,
	'clientOptions' => array(
	    'validateOnSubmit' => true,
	),
	'htmlOptions' => array(
	    'class' => 'form-signin'
	)
    ));
    ?>
    <div>
			<?php
				foreach(Yii::app()->user->getFlashes() as $key => $message) {
					echo '<div class="alert alert-' . $key . '">
                                        <button type="button" class="close" data-dismiss="alert">×</button>';
                                        echo $message . "</div>\n";
				}
			?>
        </div>
    <h4 class="sans thin">Please enter your username</h4>

    <?php echo $form->textField($model, 'username', array('class' => 'input-block-level', 'placeholder' => 'Username')); ?>
    <?php echo $form->error($model, 'username'); ?>
    <br/>

    <div class="buttons">
	<?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
    </div>
   
    <?php $this->endWidget(); ?>
</div><!-- form -->
