var pageNumber = 0;
var hasAppend = false;
var hasMoreContent = true;

$("#simplePostList").scroll(function(){  
	viewH =$(this).height(),//可见高度  
	contentH =$("#simplePostUl").height(),//内容高度  
	scrollTop =$(this).scrollTop();//滚动高度  
	//if(contentH - viewH - scrollTop <= 100) { //到达底部100px时,加载新内容  
	if(scrollTop/(contentH-viewH)>0.9 && !hasAppend && hasMoreContent){ 
		hasAppend = true;
		getPage(++pageNumber);
	}  
});  

function getPage(pageNumber)	{ 	
	var load = '<li class="simplePost loading">\
					<p align="center" style="color:green; font-family:consolas;font-size:20px;">loading...</p>\
				<li>';
    $("#simplePostUl").append(load);
    $.ajax({
        type: "POST",
        url:  hostname+'/course/discussion/get-simple-page',
        data: {pageNumber:pageNumber},
        dataType : 'text',
        success: function (data) {
        	//alert("will getPage:"+pageNumber);
        	if(data.length<5)	hasMoreContent = false;
        	$(".loading").remove();
        	$("#simplePostUl").append(data);
        	hasAppend = false;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}

function show()
{
	viewH =$("#simplePostList").height(),//可见高度  
	contentH =$("#simplePostUl").height(),//内容高度  
	scrollTop =$("#simplePostList").scrollTop();//滚动高度  
	alert("contentH="+contentH+",viewH="+viewH+",scrollTop"+scrollTop);
}