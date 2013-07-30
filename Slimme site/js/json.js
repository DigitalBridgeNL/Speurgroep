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

function loadBedrijf(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadBedrijf.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<form><table>"
			strHTML += "<tr><td>Contactpersoon</td><td><input type='text' name='contactpersoon' value='" + data[i]['contactpersoon'] + "' /></td></tr>"
			strHTML += "<tr><td>Bedrijfsnaam</td><td><input type='text' name='bedrijfsnaam' value='" + data[i]['bedrijfsnaam'] + "' /></td></tr>"
			strHTML += "<tr><td>Woon / Vestigingsadres</td><td><input type='text' name='adres' value='" + data[i]['adres'] + "' /></td></tr>"
			strHTML += "<tr><td>Postcode</td><td><input type='text' name='postcode' value='" + data[i]['postcode'] + "' /></td></tr>"
			strHTML += "<tr><td>Plaats</td><td><input type='text' name='plaats' value='" + data[i]['plaats'] + "' /></td></tr>"
			strHTML += "<tr><td>Website</td><td><input type='text' name='website' value='" + data[i]['website'] + "' /></td></tr>"
			strHTML += "<tr><td>E-Mailadres</td><td><input type='text' name='email' value='" + data[i]['email'] + "' /></td></tr>"
			strHTML += "<tr><td>Telefoonnummer 1</td><td><input type='text' name='telefoonnummer1' value='" + data[i]['telefoonnummer1'] + "' /></td></tr>"
			strHTML += "<tr><td>Telefoonnummer 2</td><td><input type='text' name='telefoonnummer2' value='" + data[i]['telefoonnummer2'] + "' /></td></tr>"
			strHTML += "</table></form>"
			}
			$("#loadBedrijf").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
        //get <td> element values here!!??
};

function loadLogin(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadLogin.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<form><table>"
			strHTML += "<tr><td>Gebruikersnaam</td><td><input type='text' name='gebruikersnaam' value='" + data[i]['username'] + "' DISABLED /></td><td></td></tr>"
			strHTML += "<tr><td>Wachtwoord</td><td><input type='password' name='wachtwoord' value='" + data[i]['wachtwoord'] + "' /></td><td><a href='#'>edit</a></td></tr>"
			strHTML += "</table></form>"
			}
			$("#loadLogin").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
        //get <td> element values here!!??
};

function loadBranche(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadBranche.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			strHTML += "<table><tr><td>Hoofdgroep</td><td>" + data[0]['branche'] + "</td></tr>"
			for (i = 1; i < data.length; i += 1) {
			strHTML += "<tr><td>Subgroep " + i + "</td><td>" + data[i]['branche'] + "</td></tr>"
			strHTML += "</table>"
			}
			$("#loadBranches").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
        //get <td> element values here!!??
};

function loadPakket(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadPakket.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<table><tr><td>Pakket keuze:</td><td>" + data[i]['pakketid'] + "</td></tr>"
			strHTML += "</table>"
			}
			$("#loadPakket").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
        //get <td> element values here!!??
};

function openModalwwvergeten() {
	$( window ).load(function() {
	
	alert('gege');
	});
};
