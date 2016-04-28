<?php
$depts = array(''=>'Select department','cs'=>'Computer','ch'=>'Chemical','it'=>'Information Technology','extc'=>'Electronics and Telecommunication','me'=>'Mechanical','is'=>'Instrumentation');
$dept='';
$years=array(''=>'Select year','fe'=>'First Year','se'=>'Second Year','te'=>'Third Year','be'=>'Final Year');
$year='';
$sems=array(''=>'Select semester','1'=>'Semester 1','2'=>'Semester 2','3'=>'Semester 3','4'=>'Semester 4','5'=>'Semester 5','6'=>'Semester 6','7'=>'Semester 7','8'=>'Semester 8');
$sem='';
$divs=array(''=>'N/A','a'=>'Division A','b'=>'Division B');
$div='';
$batchcount="";
		$dept=$_POST['dept'];
		$year=$_POST['year'];
		$sem=$_POST['sem'];
		if(isset($_POST['division']))
		$div=$_POST['division'];
?>