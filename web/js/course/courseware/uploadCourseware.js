$('#uploadform-coursewarefile').change(function()	{
	var f = document.getElementById("uploadform-coursewarefile").files
	$('#uploadform-title').val(f[0].name)
})