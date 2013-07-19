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
		<input type=image alt="submit" src="images/inloggen.png" width="125" height="50">
	</form>
</div>      
<?php include('includes/footer.php');?>