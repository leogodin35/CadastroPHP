$(function(){
	$(".listarUsuarios").on("click", function() {
		$.post('/index.php?c=usuario&a=ajaxUpdateTipo', { tipo:$(this).is(':checked'), id:$(this).val() }, function(data) {
		})
		.fail(function(jqXHR, textStatus, errorThrown) { alert('Ocorreu um erro inesperado durante o processamento.\n\n' + textStatus); });
	});
});