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
	<div class="areaConversao col-xs-12">
		<h1>Converta seu currículo do word, LibreOffice, etc. para a APInfo</h1><br />
		<ul class="nav nav-pills navbar-default ">
		  <li role="presentation" class="">
		  	<button 
		  		class="btn btn-success btnConverter" 
					title="Pega o HTML do editor, converte para o modelo da APInfo e joga no campo de resultado "
				>
					<i class="glyphicon glyphicon-refresh"></i>
					converter
				</button>
		  </li>
		  <li>
		  	<button class="btn btn-default btnPreview" title="Abre modal para previsualizar o resultado" >
					<i class="glyphicon glyphicon-sunglasses"></i>
					preview
				</button>
		  </li>
		  <li>
		  	<button 
				class="btn btn-default btnVoltarEditor" 
				title="Pega o HTML do campo de resultado e joga no editor para melhorias"
				>
					<i class="glyphicon glyphicon-backward"></i>
					voltar do código para o editor
				</button>
		  </li>
		</ul><br />
		<div class="row clearfix">
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
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>