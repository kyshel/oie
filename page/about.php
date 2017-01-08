<?php require_once('header.php');?>

<div id="show" class="markdown-body"></div>

<script src="dist/js/showdown.min.js"></script>
<script type="text/javascript">
function readTextFile(file)
{
	var rawFile = new XMLHttpRequest();
	rawFile.open("GET", file, false);
	rawFile.onreadystatechange = function ()
	{
		if(rawFile.readyState === 4)
		{
			if(rawFile.status === 200 || rawFile.status == 0)
			{
				var allText = rawFile.responseText;
				//below is showdown work
				var converter = new showdown.Converter(),
				text      = allText,
				html      = converter.makeHtml(text);
				document.getElementById('show').innerHTML=html;
			}
		}
	}
	rawFile.send(null);
}
readTextFile("../README.md");
</script>