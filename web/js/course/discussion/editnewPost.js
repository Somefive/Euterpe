/**
 * Created by Administrator on 2016/3/26.
 */
var stop=1;
function JTrim(s)
{
    var str= s.replace(/<[^>]+>/g,"");
    return str.replace(/(^\s*)|(\s*$)/g, "");
}
$("#w0").click(function(){
    if(confirm('有未提交的内容，确认离开?')&&stop==1) {stop=0;}
    else
    {
        return false;
    }
});

$(".breadcrumb").click(function(){
    if(confirm('有未提交的内容，确认离开?')) {}
    else
    {
        return false;
    }
});
document.getElementById('simplePostList').addEventListener('click',function(event){

    if(stop==0)return;
    if(confirm('有未提交的内容，确认离开?')) {stop=0;}
    else
    {
        event.stopPropagation();
    }
    /*alert($(this).attr('id'));
    alert($(this).attr('class'));
   alert(stop);
    if(stop==1)  event.stopPropagation();
    else return;
    stop=0;
    $(this).click();
    //alert($(this));
    /
   // event.do();*/
},true);
document.getElementById('newPostBtn').addEventListener('click',function(){
    stop=1;
});
document.getElementById('newPostBtn').addEventListener('click',function(event){

    if(stop==0)return;
    if(confirm('有未提交的内容，确认离开?')) {stop=0;}
    else
    {
        event.stopPropagation();
    }
},true);
document.getElementById('formgroup').addEventListener('click',function(event){
    var title=document.getElementById("newpostform-title").value;
    var content= $(".redactor-editor").text();
    if (JTrim(title) == "")
    {
        alert("您的标题不能为空");
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
    if(JTrim(content).length<2)
    {
        alert("您的内容不能为空");
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
    return true;

},true);
document.getElementById('submit').addEventListener('click',function submitNewPost()
{
    var originHtml = $(".redactor-editor").html();
    $('#contentLoader').val(originHtml);
    //alert(originHtml);

    //$(".redactor-toolbar").destory();
    var offset = $("#end").offset();
    var flyer = $("#areaShowInfo");
    flyer.fly({
        start: {
            left: event.pageX,
            top: event.pageY
        },
        end: {
            left: 10,
            top: offset.top+10,
            width: 0,
            height: 0
        },
        onEnd: function(){
            $("#areaShowInfo").hide();
            $("#hintPostSuccess").show().animate({width: '250px'}, 500).fadeOut(1000);
            //$(".redactor-editor").destory();
        }
    });
},false);

