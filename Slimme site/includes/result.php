<?php
  $host   = 'localhost'; // alternatively, you can put '127.0.0.1' here
  $dbUser = 'dragon'; // I would never use root for a production
                    // user, but for a local installation, it is ok...
  $dbPass = 'sjetel'; // or whatever it is set to be...

  $dbName = 'speurgroep'; // use your database name here
  $dbConn = mysql_connect($host, $dbUser, $dbPass)
                  or trigger_error(mysql_error(), E_USER_ERROR);
  mysql_select_db($dbName, $dbConn);

  /* Table:  messages
   * Fields: id      (INT, primary key, auto-increment)
   *         message (TEXT)
   */
  $tekst = mysql_real_escape_string($_POST['data']);
  $sql = "UPDATE page SET tekst='$tekst' WHERE id='1'";
  $queryResource = mysql_query($sql, $dbConn) or die(mysql_error());
?>