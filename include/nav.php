<div class="navbar-fixed">
<nav class="blue darken-4" role="navigation">
	    <div class="nav-wrapper container" >
	    	<a id="logo-container" href="#" class="brand-logo" style="vertical-align:middle">
	    	<img src="img/logo.png" class="navimg" alt="BVCOE_DMS">
	    		BVCOE Defaulter Management System
	    	</a>
		      <ul class="right hide-on-med-and-down">
		        <?php

		        if(isset($_SESSION['username']))
		        echo '<li><a href="defaulter/logout.php">Logout</a></li>';
		        else echo '<li><a href="login/index.php">Login</a></li>'; ?>		      
		        </ul>
		      <ul id="nav-mobile" class="side-nav">
		        <?php

		        if(isset($_SESSION['username']))
		        echo '<li><a href="defaulter/logout.php">Logout</a></li>';
		        else echo '<li><a href="login/index.php">Login</a></li>'; ?>
		      </ul>
		      	      	<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	    </div>
	  </nav>
</div>