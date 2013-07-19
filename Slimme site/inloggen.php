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
	<form action="" method="post">
		<table>
			<tr>
				<td>
				Email adres:
				</td>
				<td>
				<input type=email name="email">
				</td>
			</tr>
			<tr>
				<td>
				Wachtwoord:
				</td>
				<td>
				<input type=password name="wachtwoord">
				</td>
			</tr>
		</table>
		<input type=image alt="submit" src="images/inloggen.png" width="125" height="50">
</div>      
<?php include('includes/footer.php');?>