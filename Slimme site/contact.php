<?php
include('includes/header.php');
?>
<script>
    $( window ).load(function() {
        getContactdata();
    });
</script>
<!-- Start van Contact categorie !-->
<div class="clear"></div>
<div class="contactLeft">
	<p> Speurgroep V.O.F. </p>
	<table>
    	<tbody id="contactSG">
        </tbody>
  	</table>
</div>
<div class="contactRight">
<p> Heeft u vragen aan Speurgroep?
<p> Kies een onderwerp </p>
<ul>
	<li>
    Adverteren
    </li>
    <li>
    Betalen
    </li>
    <li>
    Problemen
    </li>
    <li>
    Overige vragen
    </li>
</ul>
</div>      
<?php include('includes/footer.php');?>