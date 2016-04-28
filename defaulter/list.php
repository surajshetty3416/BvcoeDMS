<html>
	<?php $people=array();
	session_start();

	$people=$_SESSION['people'];
	include '../include/head.php'; ?>
	<body>
		<?php include '../include/nav.php'; ?>
		<main>
			<?php 
			echo '
			<div style= "padding: 20px; width:60%; margin-left:20%; margin-top:20px;" class="z-depth-3">
			<table>
				<caption><strong>SMS Will Be sent to following People</strong></caption>
				<thead>
					<tr>
						<th>Roll NO</th>
						<th>Name</th>
						<th>Parent Phone_No</th>
					</tr>
				</thead>
				<tbody>';
					
			foreach ($people as $stud) {

				 echo	'<tr>
							<td>'.$stud['roll'].'</td>
							<td>'.$stud['name'].'</td>
							<td>'.$stud['ParentPhone'].'</td>
						</tr>';
			 				 } 

			 echo	'</tbody>
			</table>
			<form action="defaulter/sms.php" method="post" >
				
				<button class="btn waves-light waves-effect blue darken-4 " style="margin-top: 30px; margin-left:30%;" name="submit">Send SMS to Defaulters</button>
			</form>
			
			</div>';
		?>
		</main>
		<?php include'../include/foot.php'; ?>
	</body>
</html>