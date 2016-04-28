<?php
$depts = array(''=>'Select department','cs'=>'Computer','ch'=>'Chemical','it'=>'Information Technology','extc'=>'Electronics and Telecommunication','me'=>'Mechanical','is'=>'Instrumentation');
$dept='';
$years=array(''=>'Select year','fe'=>'First','se'=>'Second','te'=>'Third','be'=>'Final');
$year='';
$sems=array(''=>'Select semester','1'=>'Semester 1','2'=>'Semester 2','3'=>'Semester 3','4'=>'Semester 4','5'=>'Semester 5','6'=>'Semester 6','7'=>'Semester 7','8'=>'Semester 8');
$sem='';
$totalstudents='';
$divs=array(''=>'Select Division','1'=>'Division A','2'=>'Division B');
$div='';
//$file="";
$batchcount="";
if ( isset($_POST["submit"]) ) 
	{
		$dept=$_POST['dept'];
		$year=$_POST['year'];
		$totalstudents=$_POST['studentCount'];
		$batchcount=$_POST['batchcount'];
	}
?>