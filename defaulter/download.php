<?php 
session_start();
$status=1;
if(isset($_POST['action']))
 if(isset($_POST['dept'])&&isset($_POST['sem'])&&isset($_POST['year']))
{
    include 'retain.php'; 
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
				{
				echo'<div class="section no-pad-bot" id="index-banner">
			    <div class="container">
			      <br><br>
			      <h4 class="header center text-black ">Select Defaulter To be downloaded </h4>
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
			  }


				if($status==2)
				{	
				
					
					echo '<div style= "padding: 20px; width:95%; margin:2.5%;" class="z-depth-3">
								<div class="section no-pad-bot" id="index-banner">
							    <div class="container col l4">';
							    if(isset($_POST['division']))
							    	{$div='_'.($_POST['division']);}
							    else
							    	$div='';		
							    $file=__DIR__.'/'.$_POST['dept'].'/'.$_POST['year'].'/defaulter_'.$_POST['dept'].$div.'_'.$_POST['year'].'_sem_'.$_POST['sem'].'.xlsx';
								if(file_exists($file))
									{
										echo '
							      <br><br>
							      <h3 class="header center ">Defaulter You Want </h3>
							      
							       <div class="row">
							          <div class="input-field col l4 offset-l4 s12">
							           <strong>Department : </strong>';

										foreach($depts as $id=>$chosen){

							              	if($dept == $id){
							              		$val = $chosen;
							              	}
							             }
							              echo	$val.'
							            
							          </div>
							        </div>
							        <div class="row">
							          <div class="input-field col l4 offset-l4 s12">
							           <strong>Year : </strong>';

										foreach($years as $id=>$chosen){

							              	if($year == $id){
							              		$val = $chosen;
							              	}
							             }
							              echo	$val.'
							            
							          </div>
							        </div>
							        <div class="row">
							          <div class="input-field col l4 offset-l4 s12">
							           <strong>Semester : </strong>';

										foreach($sems as $id=>$chosen){

							              	if($sem == $id){
							              		$val = $chosen;
							              	}
							             }
							              echo	$val.'
							            
							          </div>
							        </div>
							        <div class="row">
							          <div class="input-field col l4 offset-l4 s12">
							           <strong>Division : </strong>';
							           if(isset($_POST['division']))
							    		{$div=($_POST['division']);}
							    		else
							    		$div='';
										foreach($divs as $id=>$chosen){

							              	if($div == $id){
							              		$val1 = $chosen;
							              	}
							             }
							             if($div!='')
							             {
							             	$div='_'.$div;
							             }
							             if(isset($val1))
							              echo	$val1;
							             else 
							             	echo 'N/A';
							           echo ' 
							          </div>
							        </div>
							        <div class="row">
									<div class="input-field col l4 offset-l4 s12 center-align">
									<a href="/erp/defaulter/'.$dept.'/'.$year.'/defaulter_'.$dept.$div.'_'.$year.'_sem_'.$sem.'.xlsx" class="btn waves-effect center-align" >Download</a>
									</div>
									</div>';

								}

				 else 
					 {
				   	echo 'Defaulter Not Yet Uploaded !
				   	<div class="col l4 offset-l4 center-align" style="padding-top : 2em">
							    	<a href="#" class="btn waves-light waves-effect blue darken-4">Back To Home</a>
							    	
							    </div>';

			        }
			        echo '
			         </div>
					</div></div>';
			    }
						 ?>
			
		</main>
		<?php include'../include/foot.php'; ?>
	</body>
</html>