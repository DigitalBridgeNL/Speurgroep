<?php
  session_start();
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
		$result = mysql_query('SELECT id, name FROM page WHERE catid = 1');
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 
  }
  
    function showAllpages()
  {
		openDB();
		$result = mysql_query('SELECT p.id, c.name as catname, p.name as pagename FROM categorie c, page p WHERE p.catid = c.id order by catname');
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows);
		closeDB();
  }
  
  
  function getContactdata()
  {
		openDB();
		$result = mysql_query('SELECT username, kvknr, btwnr FROM user WHERE type = "owner"');
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 
		closeDB();
  }
  
  function loadHTML($pageID)
  {
	  
	  if (isset($_POST['submit']))
	{
		$updateTekst = $_POST['editor1'];
		OpenDB();
		$result = mysql_query("UPDATE page SET tekst='$updateTekst' WHERE id='$pageID'");
		if (!$result) {
    	die('Invalid query: ' . mysql_error());
		}
		CloseDB();
	}
		openDB();
		$result = mysql_query("SELECT tekst FROM page WHERE id='$pageID'");
		if (!$result) {
		die('Invalid query: ' . mysql_error());
		}
		$pageTekst = mysql_fetch_assoc($result);
		CloseDB();	
		
		echo '<form method="post" action="">
			<textarea id="editor1" name="editor1">';
		echo $pageTekst["tekst"];
		echo '
		</textarea>
			<script type="text/javascript">
				CKEDITOR.replace("editor1");
			</script>
		<p>
			<input type="submit" name="submit" />
		</p>
	</form>';
  }
  
  function get_contentPage($pageID)
  {
	  	openDB();
	  	// Haal JSON op en plaats in variabele
		// Voer een query uit dat de content van de page ophaalt.
		$resultContent = mysql_query("SELECT * FROM page WHERE id='$pageID'") or die(mysql_error());
		$rows = array();
		$row = mysql_fetch_array($resultContent);
		
		if ($row) 
		{
			$pageName	= $row['name'];
			$content    = $row['tekst'];
			
			echo '<p>'.$pageName.'</p>';
			echo $content;
			
		}
		closeDB();
  }
  
  function get_contentPageWithoutTitle($pageID)
  {
	  	openDB();
	  	// Haal JSON op en plaats in variabele
		// Voer een query uit dat de content van de page ophaalt.
		$resultContent = mysql_query("SELECT * FROM page WHERE id='$pageID'") or die(mysql_error());
		$rows = array();
		$row = mysql_fetch_array($resultContent);
		
		if ($row) 
		{
			$content    = $row['tekst'];
			echo $content;
			
		}
		closeDB();
  }
  
  
?>
