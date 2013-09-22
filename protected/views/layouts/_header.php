<meta charset="utf-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<style>
    body {
	padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
</style>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="../assets/js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->baseUrl ?>/css/style.css" />
<link href="<?php echo Yii::app()->baseUrl ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!--[if lt IE 8]>
  <link href="<?php echo Yii::app()->baseUrl ?>/css/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet">
<![endif]-->
<?php //if(Yii::app()->getController()->getAction()->id == 'admin') Commons::loadBlockUI () ?>
<?php
    $classHead="#39a5cf";
?>
<?php if(!Yii::app()->user->isGuest){
 	if(Yii::app()->user->type==2)
	{
	 $classHead="#40939c";
	}
	if(Yii::app()->user->type==3)
	 {
	 $classHead="#d12362";
	}
	if(Yii::app()->user->type==4)
	 {
	 $classHead="#fabb00";
	}
	if(Yii::app()->user->type==5)
	 {
	 $classHead="#664bb0";
	}
}
?>
<style>
#headerContainer.blue {
    background: <?php echo $classHead?>;
}
</style>