// JavaScript Document
function getContactdata(){
			$.getJSON('../includes/getContactdata.php', function(data) {
			console.log(data);
				var i, j, strHTML = "";
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<tr><td>Contact:</td><td>" + data[i]['username'] + "</td></tr>";
					strHTML += "<tr><td>K.v.K. nummer:</td><td>" + data[i]['kvknr'] + "</td></tr>";
					strHTML += "<tr><td>BTW nummer:</td><td>" + data[i]['btwnr'] + "</td></tr>";
					}
					$("#contactSG").append(strHTML);
					});
};

function getHelpNinfopages(){
		$.getJSON('includes/getPages.php', function(data) { // Haal informatie op van getPages, hierin staat een query dat alle pagina`s van een bepaalde categorie ophaalt.
			console.log(data); // log de data ter controle in het console
				var i, j, strHTML = ""; // i = het aantal records, j is de specifieke kolom van het record, strHTML is de string van html dat door javascript aangemaakt zal worden
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<li><a href='helpNinfo.php?page=" + data[i]['id']+ "'>" + data[i]['name'] + "</a></li>";
					}
					$("#pages").html(strHTML); // Voeg de string van html toe aan het element met ID Pages.
					});
};

function getAllpages(){
		$.getJSON('../includes/getAllpages.php', function(data) { // Haal informatie op van getPages, hierin staat een query dat alle pagina`s van een bepaalde categorie ophaalt.
			console.log(data); // log de data ter controle in het console
				var i, j, strHTML = ""; // i = het aantal records, j is de specifieke kolom van het record, strHTML is de string van html dat door javascript aangemaakt zal worden
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<tr id=" + data[i]['id']+ "><td>" + data[i]['catname'] + "</td><td>" + data[i]['pagename']+"</td></tr>";
					}
					$("#pagesTable").html(strHTML); // Voeg de string van html toe aan het element met ID Pages.
					});
};

function loadHTML(){
	$("#table-scroll table").delegate('tr', 'click', function() {
        var n = $(this).attr('id');
		alert(n);
		$.ajax({
		type: 'get',
		url: 'includes/getDetails.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+n,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<header>" + data[i]['name'] + "</header>";
			strHTML += "<p>" + data[i]['tekst'] + "</p>";
			}
			$("#pageContent").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
        //get <td> element values here!!??
    });
};