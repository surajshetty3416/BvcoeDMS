<?php 
session_start();
$status=1;
if(isset($_POST['action']))
 if(isset($_POST['dept'])&&isset($_POST['sem'])&&isset($_POST['year']))
{
	$status=2;
}
 ?>

<html>
	<?php include '../include/head.php'; ?>
	<body>
		<?php include '../include/nav.php'; ?>
		<main>
			<?php
			if($status==1)
				echo'<div class="section no-pad-bot" id="index-banner">
			    <div class="container">
			      <br><br>
			      <h4 class="header center text-black ">View Defaulter of </h4>
						  <form class="col" method="post" action="'.$_SERVER["PHP_SELF"].'" enctype="multipart/form-data">

			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12">
			            <select id="dept" name="dept">
			              <option disabled selected>Select department</option>
			              <option value="cs">Computer</option>
			              <option value="it">Information Technology</option>
			              <option value="extc">Electronics and Telecommunication</option>
			              <option value="me">Mechanical</option>
			              <option value="ch">Chemical</option>
			              <option value="is">Instrumentation</option>
			            </select>
			          </div>
			        </div>

			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12">
			            <select id="year" name="year">
			              <option disabled selected>Select year</option>
			              <option value="fe">First</option>
			              <option value="se">Second</option>
			              <option value="te">Third</option>
			              <option value="be">Final</option>
			            </select>
			          </div>
			        </div>

			        <div id="division" class="row" style="display:none;">
			            <div class="input-field col l4 offset-l4 s12"> 
			              <select name="division" >
			                <option disabled selected>Select division</option>
			                <option value="a">A</option>
			                <option value="b">B</option>
			              </select>
			            </div>
			        </div>

			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12" >
			            <select id="seminput" name="sem" >
			              <option disabled selected>Select semester</option>
			              <option value="1">Semester Odd</option>
			              <option value="2">Semester Even</option>
			            </select>
			          </div>
			        </div>
			        </div>
			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12  center-align">
			            <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Submit
			              <i class="material-icons right">send</i>
			            </button>
			          </div>
			        </div>

			      </form>
			      </div>
			      </div>';


if($status==2)
{
	echo '<div style= "padding: 20px; width:95%; margin:2.5%;" class="z-depth-3">';
	error_reporting(0);
		require_once  '../Classes/PHPExcel.php';
		require_once  '../Classes/PHPExcel/IOFactory.php';
		if(isset($_POST['division']))
			$div='_'.$_POST['division'];
		else
			$div='';

		$file=__DIR__.'/'.$_POST['dept'].'/'.$_POST['year'].'/defaulter_'.$_POST['dept'].$div.'_'.$_POST['year'].'_sem_'.$_POST['sem'].'.xlsx';
		if(file_exists($file))		
		{

		$objPHPExcel = PHPExcel_IOFactory::load(__DIR__.'/'.$_POST['dept'].'/'.$_POST['year'].'/defaulter_'.$_POST['dept'].$div.'_'.$_POST['year'].'_sem_'.$_POST['sem'].'.xlsx');
		$objWriter = new PHPExcel_Writer_HTML($objPHPExcel);
		$highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		$people = array();
		for($i=9;$i<200;$i++)
		{
			$cellValue = $objPHPExcel->getActiveSheet()->getCell("S$i")->getCalculatedValue();

				if(is_numeric($cellValue) && $cellValue < 50) 
				{
					$roll = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();
					$name = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
					$pphone = $objPHPExcel -> getActiveSheet()->getCell("T$i")->getValue();
					array_push($people, array("roll" => $roll ,"name" => $name,"ParentPhone" => $pphone));
				}
		}	
			if(isset($_SESSION['username']))
			{	
				$_SESSION['people']=$people;
				echo '<a href="defaulter/list.php" style="margin-left:70%"class="btn waves-light waves-effect blue darken-4" style="padding-bottom: 10px">View only Defaulters and send SMS</a>';
			}
			//var_dump($defaulters);
			echo $objWriter->generateHTMLHeader();
			echo '<style>'.

			
			 $objWriter->generateStyles(true); // do not write <style> and </style>
		
			
			echo '</style>';		
			echo $objWriter->generateSheetData();
		}
			 else 
        	echo 'Defaulter Not Yet Uploaded !';
		}
			echo '</div>';
		 ?>
			
		</main>
		<?php include'../include/foot.php'; ?>
	</body>
</html>