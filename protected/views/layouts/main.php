<!DOCTYPE html>
<html lang="en">
    <head>
	<?php $this->renderPartial('//layouts/_header'); ?>
	<script type="text/javascript">
	    $(function() {
		$('body').on('touchstart.dropdown', '.dropdown-menu', function(e) {
		    e.stopPropagation();
		});
	    });
	</script>
	
    </head>

    <body>

	<?php echo $this->renderPartial('//layouts/_topnav') ?>

	<?php if (!empty(Yii::app()->params['mod_title']) || !empty(Yii::app()->params['mod_desc'])) { ?>
    	<div id='headerContainer' class="blue">
    	    <h1><?php if (!empty(Yii::app()->params['mod_title'])) echo Yii::app()->params['mod_title'] ?></h1>
    	    <p><?php if (!empty(Yii::app()->params['mod_desc'])) echo Yii::app()->params['mod_desc'] ?></p>
		<?php
		if (isset($this->breadcrumbs)) {
		    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		    ));
		}
		?>
    	</div>
	<?php } ?>
	<div class="container">
	    <div>
		<?php
		foreach (Yii::app()->user->getFlashes() as $key => $message) {
		    echo '<div class="alert alert-' . $key . '">
		    <button type="button" class="close" data-dismiss="alert">×</button>';
		    echo $message . "</div>\n";
		}
		?>
	    </div>
	    <?php echo $content ?>
	</div> <!-- /container -->
	<footer>
	    <?php echo $this->renderPartial('//layouts/_footer') ?>
	</footer>
    </body>

</html>
