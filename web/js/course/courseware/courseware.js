window.onload = function (){
	fileID = getQueryContent()
	if(fileID == null)	{
		alert("请指定具体要访问的文件")
		return
	}
	filename = "/courseware/"+fileID+".pdf"
	var pdf = new PDFObject({ url: filename }).embed("pdf");
};
function getQueryContent(name = "fileID")
{
	var url = location.href;
	var paras = url.substr(url.indexOf("?") + 1).split("&")
	for(var i=0;i < paras.length;i++){ 
		num=paras[i].indexOf("="); 
		if(num > 0 && paras[i].substring(0,num) == name)
			return paras[i].substr(num+1)
	} 
	return null
}