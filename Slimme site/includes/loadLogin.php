<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBinteraction.php');
		$currentuser = $_GET['id'];
		openDB();
		$result = mysql_query("SELECT * FROM user WHERE userID ='$currentuser'");
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 			
?>