<style>
textarea{
	width: 100%;
	height: 300px;
	background: #EEE;
	color: #101010;
	border: 1px solid #464646;
}
.col{
	width: 49%;
	display: inline-block;
}
.clear {
	clear: both;
}
</style>
<form action="" method="POST">
	<div class="col">
		<label for="html">Cole do word, writer, etc.</label>
		<textarea  id="html" name="html"></textarea>
		<div class="clear"></div>
	</div>
	<div class="col">
		<label for="convertedHtml">HTML convertido para ser usado na ApInfo</label>
		<textarea id="convertedHtml" name="convertedHtml"></textarea>
	</div>
	<div>
		<button>converter</button>
	</div>
</form>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
var e = tinymce.init({
	selector:'#html',
	entity_encoding : "raw",
	plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
$(function(){
	$("form").submit(function(e){
		
		var converted = convertHTML2ApInfoHTML(tinyMCE.get('html').getContent());
		// setando no visor
		$("#convertedHtml").val(converted);

		e.preventDefault();
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

</script>