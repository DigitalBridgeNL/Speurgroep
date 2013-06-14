<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <meta content="text/html; charset=utf-8" http-equiv="content-type" />
        <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
        <script type="text/javascript" src="../js/json.js"></script>
        <link href="../css/adminpanel.css" rel="stylesheet" type="text/css">
        <style>
            .cke_contents {
                height: 400px !important;
            }
        </style>
    
    </head>
    
    <script>
 $(document).ready(function() {
      $("#searchInput").keyup(function(){
			//hide all the rows
          $("#pagesTable").find("tr").hide();
 			//split the current value of searchInput
          var data = this.value.split(" ");
 			//create a jquery object of the rows
          var jo = $("#pagesTable").find("tr");
 			//Recursively filter the jquery object to get results. 
          $.each(data, function(i, v){
              jo = jo.filter("*:contains('"+v+"')");
          });
 			//show the rows that match.
          jo.show();
 			//Removes the placeholder text 
      }).focus(function(){
          this.value="";
          $(this).css({"color":"black"});
          $(this).unbind('focus');
      }).css({"color":"#C0C0C0"});
  });
</script>
<script>
 	$( window ).load(function() {
        getAllpages();
    });
	$(document).ready(function(){
    	$("#table-scroll table").delegate('tr', 'click', function() {
			var id = $(this).attr('id');
			alert(id);
			window.location.href = '?page=' + id +'';
		});
	});
</script>
    <body>
    <?php
	include('../includes/DBinteraction.php');
	?>
    <div class="pages">
    <input id="searchInput" value="Type To Filter"><br/>
    	<div id="table-wrapper">
 			<div id="table-scroll">
                <table>
                    <thead>
                        <tr>
                        <th>Categorie</th><th>Page</th>
                        </tr>
                    </thead>
                    <tbody id="pagesTable">
                    </tbody>
                </table>
    		</div>
		</div>
    </div>
    <div class="editor">
	<?php
	$pageID = $_GET['page'];
	switch ($pageID)
	{
		case  $pageID:
			loadHTML($pageID);
		break;
		default:
			loadHTML(1);
  	}	
	?>
    </div>
</body>
</html>
