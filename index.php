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
		var toConvert = $("#html").val();
		//var converted = $('<textarea />').html(toConvert).text();
		// var o = $("<div />").html(toConvert);
		// o.find("style, meta, script, title, link, img").remove();
		// var converted = o.html();
		var converted = tinyMCE.get('html').getContent().replace(/(<[a-zA-Z]+)[^>]*(>)/gm, "$1$2");
		var tmp = $("<div />").html(converted);
		tmp.find("li").each(function(){
			// console.log(this);
			$(this).html($(this).text());
		});
		converted = tmp.html();
		converted = converted.replace(/<[\/]*ul>[\r\n]*/gm, "").replace(/<([\/]*)li>[\r\n]*/gm, "");
		converted = $('<textarea />').html(converted).text();
		//replace(/<([\/]*)li>/gm, "<$1p>")
		$("#convertedHtml").val(converted);
		e.preventDefault();
	});
});

</script>