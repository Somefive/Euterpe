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
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/show-whole-post',
        data: {postId:postId},
        dataType : 'text',
        success: function (data) {
            $("#areaShowInfo").html(data);
            $("#unreadDot_"+postId).hide();
            $("#li_postId_"+postId).removeClass("unread").addClass("hasread");z
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}

function changeLike(fatherId,postId)
{
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/change-like',
        data: {fatherId:fatherId,postId:postId},
        dataType : 'text',
        success: function (data) {
            $("#areaShowInfo").html(data);
            //alert("123");
           if($("#like_"+postId).attr('class')=="like_"+postId){
               $("#like_"+postId).removeClass("like_"+postId).addClass("notlike_"+postId);
           }
           else $("#like_"+postId).removeClass("notlike_"+postId).addClass("like_"+postId);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}


function editNewPost()
{
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/edit-new-post',
        data: {nullData:"null"},
        success: function (data) {
            $("#areaShowInfo").html(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
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
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/reply-post',
        data: {fatherPostId:fatherPostId,postType:postType},
        success: function (data) {
            $("#"+divIdNeedHide).hide();
            $("#"+divIdNeedHtml).html(data);
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

    }

}
