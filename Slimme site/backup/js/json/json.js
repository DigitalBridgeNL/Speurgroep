function getItems(){
		$.getJSON('includes/getPages.php', function(data) { // Haal informatie op van getPages, hierin staat een query dat alle pagina`s van een bepaalde categorie ophaalt.
			console.log(data); // log de data ter controle in het console
				var i, j, strHTML = ""; // i = het aantal records, j is de specifieke kolom van het record, strHTML is de string van html dat door javascript aangemaakt zal worden
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<li id='" + data[i]['pageid']+ "'><a href='#' id='2'>" + data[i]['namepage'] + "</a></li>";
					}
					$("#pages").html(strHTML); // Voeg de string van html toe aan het element met ID Pages.
					});
};

function getContent() {
	$('#pages').on('click','a',function(){ // delegation functie dat wordt uitgevoerd wanneer er op een A attribuut wordt geklikt dat zich bevindt in het element met ID Pages
		var itemID = $(this).parent('li').attr('id'); // haal het id van de pagina op om hier vervolgens de content voor op te halen in het bestand getDetails.php
		console.log(itemID); // log de data ter controle in het console
		$.ajax({
		type: 'get',
		url: 'includes/getDetails.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+itemID,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<header>" + data[i]['name'] + "</header>";
			strHTML += "<p>" + data[i]['tekst'] + "</p>";
			}
			$("#pageContent").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
	});
};