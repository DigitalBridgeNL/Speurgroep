<!-- Start van Help en info categorie !-->
<div class="clear"></div>
<div class="leftNavigation">
	<section>
		<header>
		Help en Info
        </header>
        <ul class="pages">
        </ul>
    </section>
</div>
<div class="pageContent">
</div>
<script>
// JavaScript Document
function getPages(){
			$.getJSON('includes/getPages.php', function(data) {
			console.log(data);
				var i, j, strHTML = "";
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<li id='" + data[i]['id']+ ">" + data[i]['name'] + "</li>";
					}
					$(".pages").html(strHTML);
					});
};
</script>
<script>
	$(window).load(function(){
		$.getJSON('includes/getPages.php', function(data) {
			console.log(data);
				var i, j, strHTML = "";
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<li id='" + data[i]['id']+ ">" + data[i]['name'] + "</li>";
					}
					$(".pages").html(strHTML);
					});
		});
</script>
</body>
</html>