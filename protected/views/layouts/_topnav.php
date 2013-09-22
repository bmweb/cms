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
			array('label' => 'Groups', 'url' => array('group/admin')),
			array('label' => 'Units', 'url' => array('unit/admin')),
			array('label' => 'Assessment Methods', 'url' => array('assessmentmethod/admin')),
			array('label' => 'Assessments', 'url' => array('assessment/admin')),
			'---',
			array('label' => 'Trainer', 'url' => array('trainer/admin') ),
                        array('label' => 'Level of Course', 'url' => array('courseLevel/admin')),
                        array('label' => 'Field of Course', 'url' => array('courseField/admin')),
                        array('label' => 'Venue', 'url' => array('venue/admin')),
                        array('label' => 'Delivery Type', 'url' => array('deliveryType/admin')),
		//	array('label' => 'Deparments', 'url' => array('department/admin')),
		//	array('label' => 'Designations', 'url' => array('designation/admin')),
			'---',
			array('label' => 'Agents', 'url' => array('agent/admin')),
			'---',
                        array('label' => 'Staff', 'url' => array('staff/admin')),
			'---',
			array('label' => 'Fee Types', 'url' => array('feeType/admin')),
			array('label' => 'Courier Companies', 'url' => array('courierCompany/admin')),
                    array('label' => 'Roles', 'url' => array('role/admin')),
		    )),
		array('label' => 'Admissions', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
			array('label' => 'Offer Letters', 'url' => array('offerletter/admin')),
			array('label' => 'ECOEs', 'url' => array('ecoe/admin')),
			//array('label' => 'Enrollments', 'url' => array('enrollment/admin')),
			array('label' => 'Receive Drafts', 'url' => array('draft/admin')),
		    )),
		array('label' => 'Students', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
			array('label' => 'List', 'url' => array('student/admin')),
                        array('label' => 'Attendance', 'url' => array('attendance/admin')),
			array('label' => 'Results', 'url' => array('result/admin')),
			'---',
			array('label' => 'Print Transcript', 'url' => array('transcript/admin')),
			array('label' => 'Print Certificate', 'url' => array('ceritficate/admin')),
			'---',
			array('label' => 'Meetings', 'url' => array('meeting/admin')),
			array('label' => 'Warning Letter', 'url' => array('warningLetter/admin')),
		    )),
		array('label' => 'Financials', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
			array('label' => 'Add Student Fee', 'url' => array('fee/create')),
			array('label' => 'Print Receipt', 'url' => array('result/admin')),
			'---',
			array('label' => 'Generate Agent Invoice', 'url' => array('agent/generateAgentInvoice')),
			array('label' => 'Upload Invoice', 'url' => array('#')),
			array('label' => 'Mark Invoice Paid', 'url' => array('#')),
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