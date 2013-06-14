// JavaScript Document
function getPages(){
			$.getJSON('../includes/getPages.php', function(data) {
			console.log(data);
				var i, j, strHTML = "";
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<li id='" + data[i]['id']+ ">" + data[i]['name'] + "</li>";
					}
					$(".pages").append(strHTML);
					});
};
