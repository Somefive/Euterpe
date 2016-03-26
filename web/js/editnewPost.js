/**
 * Created by Administrator on 2016/3/26.
 */
var stop=1;
$("#w0").click(function(){
    if(confirm('走吗你?')&&stop==1) {stop=0;}
    else
    {
        return false;
    }
});

$(".breadcrumb").click(function(){
    if(confirm('走吗你?')) {}
    else
    {
        return false;
    }
});
document.getElementById('simplePostList').addEventListener('click',function(event){

    if(stop==0)return;
    if(confirm('走吗你?')) {stop=0;}
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

