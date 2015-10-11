<html>
<head>
	<title>Converta seu currículo do word, LibreOffice, etc. para a APInfo</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
	<!-- Modal -->
	<div id="mdPreview" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" style="padding-left:10px" >&times;</button>
	        <button type="button" class="pull-right btn btn-success btnConverter" data-dismiss="modal" style="margin-top: -2px!important;" >converter</button>
	        <h4 class="modal-title">Previsualizando currículo</h4>
	      </div>
	      <div class="modal-body">
	        <pre></pre>
	      </div>
	      <div class="modal-footer"></div>
	    </div>

	  </div>
	</div>
	<div class="areaConversao">
		<div class="container">
			<h1>Converta seu currículo do word, LibreOffice, etc. para a APInfo</h1><br/>
		</div>
		<div class=" clearfix">
			<div class="col-xs-6">
				<label for="html">Cole do word, writer, etc.</label>
				<textarea  id="html" name="html"></textarea>
				<div class="clear"></div>
			</div>
			<div class="col-xs-6">
				<label for="convertedHtml">HTML convertido para ser usado na ApInfo</label>
				<textarea class="well well-lg form-control" id="convertedHtml" name="convertedHtml"></textarea>
			</div>
			<div class="clearfix visible-xs-block"></div>
		</div><br/>
		<div class="col-xs-12">
			<button class="btn btn-success btnConverter" 
				title="Pega o HTML do editor, converte para o modelo da APInfo e joga no campo de resultado "
			>
				<i class="glyphicon glyphicon-refresh"></i>
				converter
			</button>
			<button class="btn btn-default btnPreview" title="Abre modal para previsualizar o resultado" >
				<i class="glyphicon glyphicon-sunglasses"></i>
				preview
				</button>
			<button 
				class="btn btn-default btnVoltarEditor" 
				title="Pega o HTML do campo de resultado e joga no editor para melhorias"
				>
					<i class="glyphicon glyphicon-backward"></i>
					voltar do código para o editor
				</button>
		</div>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script>
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

	</script>
</body>
</html>