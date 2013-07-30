<?php
include('includes/header.php');
?>
<!-- Start van Contact categorie !-->
<div class="clear"></div>
<div class="loginLeft">
<?php get_contentPage(20); ?>
</div>
<div class="loginRight">
	<p> Inloggen </p>
	<form data-abide action="includes/verifyUser.php" method="post">
		<table>
			<tr>
				<td>
				Email adres: <small>required</small>
				</td>
				<td>
				<input type="email" name="email" required>
				<small class="error">Vul een e-mail adres in</small>
				</td>
			</tr>
			<tr>
				<td>
				Wachtwoord: <small>required</small>
				</td>
				<td>
				<input type="password" name="wachtwoord" required>
				<small class="error">Wachtwoord is vereist</small>
				</td>
			</tr>
		</table>
		<a href="#" data-reveal-id="wachtwoordVergeten">Wachtwoord vergeten?</a>
		<input type=image alt="submit" src="images/inloggen.png" width="125" height="50">
	</form>
</div>

<div id="wachtwoordVergeten" class="reveal-modal small">
  <?php
	// wanneer er op verzenden is geklikt controleer of het e-mail adres bestaat.
	if ( isset( $_POST['wwsubmit'] ) ) {
	$myusername=$_POST['email'];
	// To protect MySQL injection (more detail about MySQL injection )
	$myusername = stripslashes($myusername);
	$myusername = mysql_real_escape_string($myusername);
	openDB();
	$sql="SELECT * FROM user WHERE username='$myusername'";
	$result=mysql_query($sql) or die('Error : '.mysql_error());
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	if($count==1){
		echo "Er is een e-mail met een activatie code verstuurd naar ".$_POST['email'].".";
		$activatiecode = generateActivatiecode(8);
		$sql="UPDATE user SET activatiecode ='$activatiecode' WHERE username='$myusername'";
		mysql_query($sql) or die('Error : '.mysql_error());
		//functie staat in DBinteraction
		sendActivationMail($myusername, $activatiecode);
	}
	else {
	echo 'Het ingevoerde email adres is niet bij ons bekend. Probeert u het opnieuw.';
	}
	// open reveal modal zodat de gebruiker bericht kan krijgen over het ingevoerde email adres
	echo "<script type='text/javascript'> $(document).ready(function() { $('#wachtwoordVergeten').foundation('reveal', 'open'); }); </script>";
	}
	
	// als het count niet 1 is, laat het formulier zien.
	if($count==!1){ ?>
	  <form data-abide action="" method="post">
		<table>
			<tr>
				<td>
				E-mail adres: <small>required</small>
				</td>
				<td>
					<input type="email" name="email" required>
					<small class="error">Vul een e-mail adres in</small>
					</td>
				</tr>
		</table>
		<input type="submit" class="small button" name="wwsubmit" />
	 </form>
	<?php }?>
	<a href="#" data-reveal-id="activatieCode">Activatie code invoeren?</a>
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="wwSucces" class="reveal-modal small">

<p> Uw wachtwoord is met succes gereset. U kunt nu hier inloggen </p>
<form data-abide action="includes/verifyUser.php" method="post">
		<table>
			<tr>
				<td>
				Email adres: <small>required</small>
				</td>
				<td>
				<input type="email" name="email" required>
				<small class="error">Vul een e-mail adres in</small>
				</td>
			</tr>
			<tr>
				<td>
				Wachtwoord: <small>required</small>
				</td>
				<td>
				<input type="password" name="wachtwoord" required>
				<small class="error">Wachtwoord is vereist</small>
				</td>
			</tr>
		</table>
		<input type=image alt="submit" src="images/inloggen.png" width="125" height="50">
	</form>


</div>

<div id="activatieCode" class="reveal-modal small">
<?php
if ( isset( $_POST['acsubmit'] ) ) {
	$pass1 = $_POST['password1'];
	$pass2 = $_POST['password2'];
	$acode = $_POST['activatiecode'];
	$acode = stripslashes($acode);
	$acode = mysql_real_escape_string($acode);
	if ($pass1 == $pass2)
	{
	openDB();
	$sql="UPDATE user SET password ='$pass1' WHERE activatiecode='$acode'";
	$result=mysql_query($sql) or die('Error : '.mysql_error());
	echo "<script type='text/javascript'> $(document).ready(function() { $('#wwSucces').foundation('reveal', 'open'); }); </script>";
	}
	

}

?>
<form data-abide action="" method="post">
		<table>
			<tr>
				<td>
				Activatie code: <small>required</small>
				</td>
				<td>
					<input type="text" name="activatiecode" required>
					<small class="error">Vul de activatiecode in</small>
					</td>
			</tr>
			<tr>
				<td>
				Nieuw wachtwoord: <small>required</small>
				</td>
				<td>
					<input type="password" name="password1" required>
					<small class="error">Vul het nieuwe wachtwoord in</small>
					</td>
			</tr>
			<tr>
				<td>
				Nieuw wachtwoord: <small>required</small>
				</td>
				<td>
					<input type="password" name="password2" required>
					<small class="error">Vul wachtwoord nogmaals in</small>
					</td>
			</tr>
		</table>
		<input type="submit" class="small button" name="acsubmit" />
</form>
</div>
    
<?php include('includes/footer.php');?>