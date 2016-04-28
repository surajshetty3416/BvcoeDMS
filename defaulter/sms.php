<html>
<?php
session_start();

	if(isset($_SESSION) and isset($_SESSION['people']))
	{


		 $people=array();
		 $people=$_SESSION['people'];
		include '../include/head.php'; 

	}	
?>
	<body>
		<?php include '../include/nav.php'; ?>
		<main>
			<?php 
			echo '
			<div style= "padding: 20px; width:60%; margin-left:20%; margin-top:20px;" class="z-depth-3">';
					

			$numbers= array(918689861709);
			$sender='BVCOE';
  require '../php-in/textlocal.class.php';
  $textlocal=new textlocal('arss.yuss@gmail.com','34f21e593938fda3bc3265fa8f239952162b37fa');
  $response = $textlocal->sendSms($numbers,'attendance low !!!','TXTLCL');
  print_r($response);


		//foreach ($people as $stud) {
	 	

		/*$username = "shubham1" ;
		$passphrase = "shubham1" ;
		$mobile = "7058747585" ;
		$msg = "Your Ward Rohan has low attendance. Please have a check on it.";
		$message = urlencode($msg);
		$sendername = "BVCOE" ;

		$Url = "http://smsc.smsconnexion.com/api/gateway.aspx?action=send&username=".$username."&passphrase=".$passphrase."&message=".$message."&phone=".$mobile;	
		if(!empty($sendername))
		{
			$Url=$Url."&from=".$sendername;
		}
		// is curl installed?
	    	if (!function_exists('curl_init')){ 
			echo('CURL is not installed!');
	        	die('CURL is not installed!');
	    	}
	 
		// create a new curl resource
	    	$ch = curl_init();
	 
	     	// set URL to download
	    	curl_setopt($ch, CURLOPT_URL, $Url);
	 
	    	// remove header? 0 = yes, 1 = no
	    	curl_setopt($ch, CURLOPT_HEADER, 0);
	 
	    	// should curl return or print the data? true = return, false = print
	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	    	// timeout in seconds
	    	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	 
	    	// download the given URL, and return output
	    	$output = curl_exec($ch);

	    	// close the curl resource, and free system resources
	    	curl_close($ch);
	    	echo '<div style="margin:3px">';
	    	// print output
	    	if($output[0]==1)
	    	echo "Message to ".$mobile." sent Successfully.";
	    	else
	    		echo "Message to ".$mobile. " Failed !!";
	    	echo '</div>';
		//}*/
			 echo	'</div>';
		?>
		</main>
		<?php include'../include/foot.php'; ?>
	</body>
</html>

