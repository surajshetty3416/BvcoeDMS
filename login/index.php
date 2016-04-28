<?php
session_start();
$check=0;
if(isset($_POST["submit"]))
{
		  if($_POST['username']=='admin'&&hash("sha1",$_POST['password'])=='bd0d3242ffedfed436c90f41985ca083fd5348c8')
		  { 
		    $_SESSION["username"]=$_POST['username'];
		    header('Location: ../index.php');
		  }
		  else
		  	$check=1;
}
  ?>
<html>
	<?php include '../include/head.php'; ?>
	<body >
		<?php include '../include/nav.php'; ?>
		<main>
		<div class="section no-pad-bot" id="index-banner">
			    <div class="container col l4">
			      <br><br>
			      <h3 class="header center ">Teachers Login</h3>
			      <?php// echo $_SERVER['HTTP_REFERER']; ?>
			      <form class="col" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12">
			           <i class="material-icons prefix">account_circle</i>
			            <label for="username">Username</label>
			            <input type="text" placeholder="Enter Username"name="username" id="icon-prefix" class="validate" required>
			          </div>
			        </div>

			        <div class="row">
			          <div class="input-field col l4 offset-l4 s12">
			            <i class="material-icons prefix">lock</i>
			            <label for="password">Password</label>
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
			        if($check==1)
			          echo "Login failed try again!!";
			        ?>
			        </div>
			        </div>
			      </form>
			      
			    </div>
			  </div>
			</main>
		<?php include'../include/foot.php'; ?>
	</body>
</html>