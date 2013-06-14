<?php
		session_start();
		header('Content-type: application/json');
		// Verbinding met de database
		include('../../includes/connect.php');
		// Haal JSON op en plaats in variabele
		$meldingID = $_GET['id'];
		// Voer eerst een delete query uit dat alle bestelregels van het bestelnr verwijderd
		$resultDetails = mysql_query("SELECT * FROM melding WHERE meldingID='$meldingID'") or die(mysql_error());
		$rows = array();
		while($r = mysql_fetch_assoc($resultDetails)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
	echo json_encode($rows);
?>
