<?php
  $DB;
//----------------------------------------------------------------------Algemene functies
  function openDB()
  {
      $DB = mysql_connect("localhost", "dragon", "sjetel");
      if (!$DB)
      {
        die('Could not connect to the database server: ' . mysql_error());
      }
      mysql_select_db("speurgroep", $DB) or die('Could not connect to the database. Database may not exist.' . mysql_error());
  }

  function closeDB()
  {
      	mysql_close($DB);
  }

  function showPages()
  {
		openDB();
		$result = mysql_query('SELECT pageid, namepage FROM pagescat WHERE catid = 1');
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 
  }
  
  function get_contentPage()
  {
	  	openDB();
	  	// Haal JSON op en plaats in variabele
		$pageID = $_GET['id'];
		// Voer een query uit dat de content van de page ophaalt.
		$resultContent = mysql_query("SELECT * FROM page WHERE id='$pageID'") or die(mysql_error());
		$rows = array();
		while($r = mysql_fetch_assoc($resultContent)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows);
  }
?>
