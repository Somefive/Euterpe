/**
 * Created by Administrator on 2016/3/6.
 */
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
            $("#li_postId_"+postId).removeClass("unread").addClass("hasread");
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

/*
 * ajax传给控制器的rule定义:
 * "rule:unread"=>只显示未读的
 * "rule:all"=>显示所有
 */
function getUnreadList()
{

    $("li.hasread").hide();
    /*$.ajax({
        type: "POST",
        url: 'http://localhost:8080/course/discussion/modify-show-rule',
        data: {rule:"unread"},
        success: function (data) {
            $("#simplePostList").empty();
            $("#simplePostList").html(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });*/
}
function getSpecificManList(Id)
{
    $("li.simplePost").hide();
    $("li.postManId_"+Id).show();
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
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}