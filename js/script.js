var e = tinymce.init({
	selector:'#html',
	entity_encoding : "raw",
	plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks",
    "insertdatetime media table contextmenu paste"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
$(function(){
	$("button.btnConverter").click(function(){
		var converted = convertHTML2ApInfoHTML(tinyMCE.get('html').getContent());
		$("#convertedHtml").val(converted);
	});
	$("button.btnPreview").click(function(){
		var md = $("#mdPreview"), ed = tinyMCE.get('html'), converted = convertHTML2ApInfoHTML(ed.getContent());
		md.find(".modal-body pre").html(converted);
		md.modal('show');
	});
	$("button.btnVoltarEditor").click(function(){
		var ed = tinyMCE.get('html');
		ed.setContent($("#convertedHtml").val());
	});
});

/**
 * Limpa e converte o HTML do tinymce para um formato aceito pela APInfo tentando exibir da melhor forma
 */
function convertHTML2ApInfoHTML (raw) {
	// tirando os atributos das tags 
	raw = raw.replace(/(<[a-zA-Z]+)[^>]*(>)/gm, "$1$2");
	// tirando os parágrafos de dentro das lis
	var tmp = $("<div />").html(raw);
	tmp.find("li").each(function(){
		$(this).html($(this).text());
	});
	raw = tmp.html();
	// removendo as uls lis
	raw = raw.replace(/<[\/]*ul>[\r\n]*/gm, "").replace(/<([\/]*)li>[\r\n]*/gm, "");
	// convertendo as html entities para raw text
	return $('<textarea />').html(raw).text();
}
