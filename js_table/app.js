$(".del-Icon").click(function(){
	$('#succbox').hide(); // die info box ausblenden
if(confirm("Wollen sie dieses Projekt löschen?"+$(this).parent().parent().attr("id"))){
	console.log("Es ist richtig!"+$(this).parent().parent().attr("id")); //this ist das span element and dem das click event gebunden wurde
	//Kommunikation mit dem Server aufnehmen um dem Server mitzuteilen dass das Projekt mit der ID "id" zu löschen ist
	var help = $(this).parent().parent().attr("id");

	var myAJAXConf = {
		url:"//localhost/medt/js_table/index.php",
		method: "POST",
		data: "deleteProID="+$(this).parent().parent().attr("id"), // vom Typ string
		//data: {deleteProID:this.id} object
		success: function(serverResponse){
			console.log("Server response: " + serverResponse);
			if(serverResponse){
				//Tabellenzeile entfernen und Infobox "Löschen" einblenden!
				$('#succbox').text("Löschen erfolgreich").addClass("bg-success").show(300).fadeOut(2000);
				console.log("test1");
				$("#"+help).remove();
				console.log("test");
				//alert("Das Löschen war erfolgreich!");
			}
			else{
				//Infobox "Löschen war nicht erfolgreich" einblenden!
			}
		},
		error: function(){

		}
	};
	$.ajax(myAJAXConf); //AJAX-Request mit dem Konfigurationsobjekt absetzen
}
else
	console.log("Es ist falsch!" + $(this).parent().parent().attr("id"));
});