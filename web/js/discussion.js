/**
 * Created by Administrator on 2016/3/6.
 */

/**
 * 储存所有已经选择的筛选规则，用来被后续遍历调用，
 * 避免已选择的筛选因为刷新而丢失
 * 根据覆盖是否存在问题 排序规则
 * selectedRulesArray[0] = "getAllNorUnreadList('callByFunction')" ;
 * selectedRulesArray[1] = "getSpecificManList('name','callByFunction')"
 * selectedRulesArray[2] = "getUnreadList('callByFunction')"
 */
var indexOfFunction = {"getAllNorUnreadList":0, "getSpecificManList":1, "getUnreadList":2};
var selectedRulesArray = new Array("","","");

function showWholePost(postId)
{
    var load = '<div class="container_p">\
                    <div class="progress">\
                        <div class="progress-bar">\
                            <div class="progress-shadow"></div>\
                        </div>\
                    </div>\
                </div>';
    $("#areaShowInfo").html(load);
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/show-whole-post',
        data: {postId:postId},
        dataType : 'text',
        success: function (data) {
            $("#areaShowInfo").html(data);
            $("#unreadDot_"+postId).hide();
            $("#li_postId_"+postId).removeClass("unread").addClass("hasread");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}

function changeLike(username,postId)
{
    $("#like1_"+postId).css("background-position","")
    var D=$("#like1_"+postId).attr("rel");
    if(D === 'unlike') {
        $("#like1_"+postId).addClass("heartAnimation").attr("rel","like");
    }
    else{
        $("#like1_"+postId).removeClass("heartAnimation").attr("rel","unlike");
        $("#like1_"+postId).css("background-position","left");
    }
    //alert(username);
    var exist = 0;
    var name=$("#name"+postId).text();
    /*var i=name.length;
    name=name.substring(ii,i);
    alert(name);
    alert(name.length);*/
    exist=name.indexOf(username);
    if(exist==-1){
        if(name.length==29||name.length==0)name=username+"等共1人赞过";
        else {
            var deng=name.lastIndexOf("等");
            var string=name.split(name.charAt(deng));
            name=string[0]+","+username+"等";
            var count=parseInt(string[1][1]);
            count++;
            var string2=string[1].split(string[1][1]);
            string[1]=string2[0]+count+string2[1];
            name=name+string[1];
        }
        $("#name"+postId).empty()
        $("#name"+postId).append(name);
    }
    else
    {
        var string3=name.split(username);
        name=string3.join("");
        var deng=name.lastIndexOf("等");
        var string4=name.split(name.charAt(deng));
        string4[0]=string4[0].substring(0,string4[0].length-1);
        //alert(string4[1]);
        var count1=parseInt(string4[1][1]);
        count1--;
        //alert(count1);
        if(count1==0)name="";
        else{
            var string5=string4[1].split(string4[1][1]);
            string4[1]=string5[0]+count1+string5[1];
            name=string4[0]+"等"+string4[1];
        }
        $("#name"+postId).empty()
        $("#name"+postId).append(name);
        //$("#name").append(username+"等共"+count+"人点赞");
    }

   $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/change-like',
        data: {postId:postId},
        dataType : 'text',
        success: function (data) {

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}


function editNewPost()
{
    //加载动画，load1，load2，load6
    var load =
        '<div class="inner">\
            <div class="load-container load1">\
              <div class="loader">Loading...</div>\
            </div>\
         </div>';
    $("#areaShowInfo").html(load);
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/edit-new-post',
        data: {nullData:"null"},
        success: function (data) {
            $("#areaShowInfo").html(data);
            $(".redactor-editor").bind("keyup",dealInputAt);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}

function dealInputAt()   {
    var currentValue = $(".redactor-editor").text();
    currentValue = $(".redactor-editor").text();
    if(currentValue.substr(currentValue.length-1,1) == '@') {
        $("#remindList").modal('show');
    }
}


function getSelectedRemindName()    {
    var remindName = "";
    $('input[name="NewPostForm[remindList][]"]:checked').each(function(){
        if(remindName == "" ) remindName = ($(this).parent().text());
        else remindName += ("@"+($(this).parent().text()));
    });

    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/accept-remind-list',
        data: {remindName:remindName},
        success: function (data) {
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });

    $("#remindList").modal('hide');
    var originHtml = $(".redactor-editor").html();
    var atHtml = "<strong data-verified='redactor' data-redactor-tag='strong'>"+remindName+"</strong>"
    var htmlWithAt = originHtml.substr(0,originHtml.length-2)+atHtml;
    $(".redactor-editor").html(htmlWithAt);

}

/**
 * 取消unread筛选，显示所有的帖子
 * 被调用在views\course\discussion\discussion.php
 * 若是内部的其它函数调用，则增加arguments[0]
 */
function getAllNorUnreadList()
{
    if(!arguments[0])   { //是view页面调用的本函数
        functionIndex = indexOfFunction["getAllNorUnreadList"];
        selectedRulesArray[functionIndex] = "getAllNorUnreadList('callByFunction')";

        unreadFunctionIndex = indexOfFunction["getUnreadList"];
        selectedRulesArray[unreadFunctionIndex] = "";

        keepAllSelectedRules();
        return;
    }
    $("li.simplePost").show();
}

/*
 * 只显示某人的精简帖子列表,
 * 只显示name的帖子，并且隐藏所有匿名的帖子（被调用在views\course\discussion\simplePostList.php）
 * 如果name是var@ALL，则显示全部的帖子
 * 若是内部的其它函数调用，则增加arguments[1]
 */
function getSpecificManList(name)
{
    if(!arguments[1])   { //是view页面调用的本函数
        functionIndex = indexOfFunction["getSpecificManList"];
        selectedRulesArray[functionIndex] = "getSpecificManList('"+name+"','callByFunction')";
        keepAllSelectedRules();
        return;
    }

    $("li.simplePost").hide();
    if(name == 'var@ALL')   {
        $("li.simplePost").show();
    }
    else {
        $("li.postManName_" + name).show();
        $("li.anoymous").hide();
    }
}

/*
 * 得到未读的帖子列表
 * 被调用在views\course\discussion\discussion.php
 * 若是内部的其它函数调用，则增加arguments[0]
 */
function getUnreadList()
{

    if(!arguments[0])   { //是view页面调用的本函数
        functionIndex = indexOfFunction["getUnreadList"];
        selectedRulesArray[functionIndex] = "getUnreadList('callByFunction')";

        cancelUnreadFunctionIndex = indexOfFunction["getAllNorUnreadList"];
        selectedRulesArray[cancelUnreadFunctionIndex] = "";

        keepAllSelectedRules();
        return;
    }
    $("li.hasread").hide();
}

/*
 *处理simplePost的排序问题
 */
function modifyOrderRule(orderRule)
{
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/modify-order-rule',
        data: {orderRule:orderRule},
        success: function (data) {
            $("#simplePostList").empty();
            $("#simplePostList").html(data);
            keepAllSelectedRules();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}

/**
 * 根据数组selectedRulesArray里面储存的规则，逐一调用
 * ruleIndexNotNeedCall是不需要进行call的函数
 */
function keepAllSelectedRules()
{
    for(var index = 0;index<selectedRulesArray.length; index++)  {
        eval(selectedRulesArray[index]);
    }
}


/*
 * 回复主贴的帖子
 */
function replyPost(fatherPostId,postType,divIdNeedHide,divIdNeedHtml)
{
    //alert(fatherPostId+","+postType+","+divIdNeedHide+","+divIdNeedHtml);
    //加载动画，load1，load2，load6
    var load =
        '<div class="inner">\
            <div class="load-container load1">\
              <div class="loader">Loading...</div>\
            </div>\
         </div>';
    $("#"+divIdNeedHide).hide();
    $("#"+divIdNeedHtml).html(load);
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/reply-post',
        data: {fatherPostId:fatherPostId,postType:postType},
        success: function (data) {
            $("#"+divIdNeedHtml).html(data);
            $(".redactor-editor").focus();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}
/**
 * 删除帖子
 * @param postType 帖子的类型.0,1,2分别对应A，B，C类帖子
 * @param fatherPostId 父亲帖子的Id，若没有父贴，则设置为-1
 * @param postId 删除的帖子的Id。
 * 被调用在views\course\discussion\showWholePost.php
 */
function deletePost(postType,fatherPostId,postId)
{
    if(postType == 0)   {
        $("#areaShowInfo").hide('slow');
        $.ajax({
            type: "POST",
            url: 'http://localhost:8080/course/discussion/delete-main-post',
            data: {postId:postId}
        });
    }
    else if(postType == 1)  {
        $("#follow_post_"+postId).hide('slow');
        $.ajax({
            type: "POST",
            url: 'http://localhost:8080/course/discussion/delete-follow-post',
            data: {postId:postId,fatherPostId:fatherPostId},
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.statusText);
            }
        });
    }
    else if(postType == 2)  {
        $("#talk_post_"+postId).hide('slow');
        $.ajax({
            type: "POST",
            url: 'http://localhost:8080/course/discussion/delete-talk-post',
            data: {postId:postId,fatherPostId:fatherPostId},
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.statusText);
            }
        });
    }
}

function say()
{
    alert("hello");
}


