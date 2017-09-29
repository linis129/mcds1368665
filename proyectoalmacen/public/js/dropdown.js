$("#region").change(function(event) {
	$.get("municipios/"+event.target.value+"",function(response,region){
		$("#municipio").empty();
		for(i=0; i<response.length; i++) {
			$("#municipio").append("<option value='"+response[i].id_municipio+"'>"+response[i].nombre+"</option>");

		}
	});
}); 

$("#region").change(event => {
	$.get('municipios/${event.target.value}',function(res, sta){
		$("#municipio").empty();
		res.forEach(element => {
			$("#municipio").append('<option value=${element.id_municipio}>${element.nombre}</option>');
		});

	});
});