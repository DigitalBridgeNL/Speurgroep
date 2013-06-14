<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBinteraction.php');
		showPages();
		//openDB();
		//$result = mysql_query('SELECT pc.pageid, p.name FROM page p, categorie c, pagescat pc WHERE pc.id = 1');
		// Plaats het resultaat van de query in een array
		
?>