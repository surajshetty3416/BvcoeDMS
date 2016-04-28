<html>
	<?php include 'include/head.php'; ?>
	<body class="  orange darken-3">
	<?php include 'include/retain.php'; ?>
	<?php session_start();?>
	<?php include 'include/nav.php';?>  
	<main>
	<div class="section no-pad-bot" id="index-banner">
    <div class="container" style="padding-top:2em">
      <h3 class="header center white-text " style="padding-bottom : 0.6em">Select Option</h3>
      <div class="row center">
          <div class="col " style="padding : 2em">
            <a href="defaulter/upload.php" class="col l4 offset-l4 s12 waves-effect waves-light blue darken-4 z-depth-3" id ="option1">
            	<center><i class="large material-icons" id="upload">open_in_browser</i>
            	<h5 id="h5">upload</h5>
            	</center>
            </a>
            </div>
            <div class="col" style="padding : 2em">
             <a href="defaulter/view.php" class="col l4 offset-l4 s12 waves-effect waves-light blue darken-4 z-depth-3" id ="option1">
            	<center><i class="large material-icons" id="upload">supervisor_account</i>
            	<h5 id="h5">View</h5>
            	</center>
            </a>
          </div>
          <div class="col" style="padding : 2em">
             <a href="defaulter/download.php" class="col l4 offset-l4 s12 waves-effect waves-light blue darken-4 z-depth-3" id ="option1">
            	<center><i class="large material-icons" id="upload">system_update_alt</i>
            	<h5 id="h5">Download</h5>
            	</center>
            </a>
          </div>
    </div>
  </div>
  </main>
 
	<?php include 'include/foot.php'; ?>
</body>
 <script>
  $(document).ready(function(){
      $('.parallax').parallax();
    });</script>
</html>