<?php
session_start();
$failed=0;
if(isset($_SESSION["username"]))
{
	$failed=1;
}
if(isset($_POST['dept'])&&isset($_POST['sem'])&&isset($_POST['year']))
{
	$failed=2;
}
else if(isset($_POST["submit"]))
{
		  if($_POST['username']=='admin'&&hash("sha1",$_POST['password'])=='bd0d3242ffedfed436c90f41985ca083fd5348c8')
		  { 
		    $_SESSION["username"]=$_POST['username'];
		    $failed=1;
		  }
}
  ?>
<html>
	<?php include '../include/head.php'; ?>
	<body >
		<?php include '../include/nav.php'; ?>
		<main>
		<?php  if($failed==0)
			 
			echo ' <div class="section no-pad-bot" id="index-banner">
			    <div class="container col l4">
			      <br><br>
			      <h3 class="header center ">Teachers Login</h3>
			      
			      <form class="col" action="'.$_SERVER["PHP_SELF"].'" method="post">

			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12">
			           <i class="material-icons prefix">account_circle</i>
			            <label for="username " class="active">Username</label>
			            <input type="text" placeholder="Enter Username"name="username" id="icon-prefix" class="validate" required>
			          </div>
			        </div>

			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12">
			            <i class="material-icons prefix blue-darken-4">lock</i>
			            <label for="password" class="active">Password</label>
			            <input type="password" placeholder="Enter Password" name="password" id="password" class="validate" required>
			          </div>
			        </div>
			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12  center-align">
			            <button class="btn waves-effect waves-light blue darken-4" type="submit" name="submit">Login
			              <i class="material-icons right">send</i>
			            </button>
			          </div>
			        </div>
			        <div class="row"> 
			        <div class="input-field col l4 offset-l4 s12  center-align">       
			        <?php
			        if($failed==1)
			          echo "Login failed try again!!";
			        ?>
			        </div>
			        </div>
			      </form>
			      
			    </div>
			  </div>';
			  		?>
			  <?php  if($failed==1)
			  echo '
			<div class="section no-pad-bot" id="index-banner">
			    <div class="container">
			      <br><br>
			      <h4 class="header center text-black ">Upload Defaulter Excel File </h4>
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
					<div class="row ">
					<div class="file-field input-field col l4 offset-l4 s12">
	      				<div class="btn waves-effect waves-light blue">
	      					<i class="material-icons">subtitles</i>
	        				<input type="file" name="file" id="file" required accept=".xls,.xlsx">
	      				</div>
	      				<div class="file-path-wrapper">
	        				<input class="file-path validate" placeholder="Defaulter excel file" type="text">
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
			  ?>
			  <?php
			  if($failed==2)
			  {
			  	$dept=$_POST['dept'];
			  	$sem=$_POST['sem'];
			  	$year=$_POST['year'];
			  	if(isset($_POST['division']))
			  	{
			  	$div='_';
			  	$div.=$_POST['division'];
			  	}
			  	else
			  	$div=null;

			  	if ( isset($_FILES["file"])) 
					{

						if ($_FILES["file"]["error"] > 0) 
						{
							echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
						}
						else 
						{	
							
							if (file_exists($_FILES["file"]["name"])) 
							{
								unlink($_FILES["file"]["name"]);
							}
							$storagename = "defaulter_".$dept.$div."_".$year."_sem_".$sem.".xlsx";
							$structure = './'.$dept.'/'.$year.'/';

								// To create the nested structure, the $recursive parameter 
								// to mkdir() must be specified.
							if(!is_dir($structure))
									{
								if (!mkdir($structure, 0777, true)) {
								    die('Failed to create folders...');
								}}
							
							move_uploaded_file($_FILES["file"]["tmp_name"],  "$dept/$year/$storagename");
							echo '<div style= "padding: 20px; width:95%; margin:2.5%;" class="z-depth-3">
							  <div class="section no-pad-bot" id="index-banner">
							    <div class="container col l4" style="padding-bottom : 2em">
							    Defaulter Uploaded SuccessFully !!!
							    <div class="col l4 offset-l4 center-align" style="padding-top : 2em">
							    	<a href="#" class="btn waves-light waves-effect blue-darken-4">Back To Home</a>
							    	
							    </div>
							    </div>
							    </div>
							    </div>';
							$uploadedStatus = 1;
							
						 }
					}	
				} 
			  ?>
	
		</main>
		<?php include'../include/foot.php'; ?>
	</body>
</html>
