$('#uploadform-coursewarefile').change(function()	{
	var f = document.getElementById("uploadform-coursewarefile").files
	var name = f[0].name
	name = name.substring(0,name.lastIndexOf(".")); 
	$('#uploadform-title').val(name)
})