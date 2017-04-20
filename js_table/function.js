$("#add").click(function(){
	$("#t").find("#mytbody").append( "<tr><td>test</td><td>111111$</td></tr>" );
});
$("#del").click(function(){
		
$("#t").find("#mytbody tr:last").remove();
});