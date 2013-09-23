<?php

$this->widget('bootstrap.widgets.TbNavbar', array(
    'brand' => Yii::app()->name,
    'type' => 'inverse',
    'items' => array(
	array(
	    'class' => 'bootstrap.widgets.TbMenu',
	    'items' => array(
		array('label' => 'Home', 'url' => '#', 'active' => true),
		array('label' => 'Login', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
		array('label' => 'My Office', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
			array('label' => 'Courses', 'url' => array('course/admin')),
			array('label' => 'Intakes', 'url' => array('intake/admin')),
			array('label' => 'Units', 'url' => array('unit/admin')),
			'---',
                        array('label' => 'Level of Course', 'url' => array('courseLevel/admin')),
                        //array('label' => 'Field of Course', 'url' => array('courseField/admin')),
                        array('label' => 'Venue', 'url' => array('venue/admin')),
			'---',
			array('label' => 'Staff', 'url' => array('staff/admin')),
			
		    )),
		
		array('label' => 'Students', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
			array('label' => 'List', 'url' => array('student/admin')),
                        array('label' => 'Attendance', 'url' => array('attendance/admin')),
			array('label' => 'Results', 'url' => array('result/admin')),
			'---',
                        array('label' => 'Add Student Fee', 'url' => array('fee/create')),
			)),
	
              ),
	),
	array(
	    'class' => 'bootstrap.widgets.TbMenu',
	    'htmlOptions' => array('class' => 'pull-right'),
	    'items' => array(

		array('label' => 'Options', 'url' => '#', 'visible'=>!Yii::app()->user->isGuest, 'items' => array(
		//	array('label' => 'Change Campus', 'url' => '#'),
		//	'---',
                        array('label' => 'Change Password', 'url' => array("user/changepassword")),
			'---',
			array('label' => 'Logout', 'url' => array('site/logout')),
		    )),
	    )),
    )
));
?>