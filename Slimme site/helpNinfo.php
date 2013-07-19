<?php
include('includes/header.php');
?>
<script>
 $( window ).load(function() {
        getHelpNinfopages();
    });	
</script>
<!-- Start van Help en info categorie -->
<div class="clear"></div>
<div class="leftNavigation">
		<header>
		<p>Help en Info</p>
        </header>
        <ul id="pages">
		
      	</ul>
</div>
<div id="pageContent">
	<?php
	$pageID = $_GET['page'];
	switch ($pageID)
	{
		case  $pageID:
			get_contentPage($pageID);
		break;
		default:
			get_contentPage(1);
  	}	
	?>
</div>

<div class="vragenLink">
<p>Heeft u een vraag? </p>
<a href="contact.php" >Klik hier</a>
</div>
<?php include('includes/footer.php');?>