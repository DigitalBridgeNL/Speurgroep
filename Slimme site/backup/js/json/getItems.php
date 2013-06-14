<?php
		session_start();
		header('Content-type: application/json');
		// Verbinding met de database
		include('../../includes/connect.php');
		
		$resultItems = mysql_query("SELECT * FROM melding") or die(mysql_error());
		// Plaats het resultaat van de query in een array
		$rows = array();
		while($r = mysql_fetch_assoc($resultItems)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows);
?>