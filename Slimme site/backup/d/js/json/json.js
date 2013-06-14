function getItems(){
	$.getJSON('js/json/getItems.php', function(data) {
		console.log(data);
		var i, j, strHTML = "<table id='items' class='table table-striped'><thead><th>Melding ID</th><th>Omschrijving</th><th>Action</th></thead><tbody>";
		for (i = 0; i < data.length; i += 1) {
			strHTML += "<tr><td>" + data[i]['meldingID'] + "</td>";
			strHTML += "<td>" + data[i]['omschrijving'] + "</td>";
			strHTML += "<td><a id='loadItem' class='tabBtn' href='#' onclick='getDetails()'>+</a></td>";
			}
			strHTML += "</tbody></table>";
			$("#listItems").html(strHTML);
			});
};

function getDetails() {
	$("#items").on("click", "a", function () {
		var itemID = $(this).parent().siblings().eq(0).text();
		console.log(itemID);
		$.ajax({
		type: 'get',
		url: 'js/json/getDetails.php',
		data: 'id='+itemID,
		success: function(data) {
			var i, j, strHTML = "<form><label>Omschrijving</label>";
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<input type='text' value='" + data[i]['omschrijving'] + "'></input>";
			}
			strHTML += "</form>";
			$("#viewItem").html(strHTML);
			}
		});
	});
};