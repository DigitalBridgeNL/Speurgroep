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
		$result = mysql_query('SELECT pc.pageid, p.name FROM page p, categorie c, pagescat pc WHERE pc.id = 1');
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 
  }
?>
