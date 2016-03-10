/**
 * Created by Administrator on 2016/3/6.
 */
/**
 **TODO:
 * 已经测试：先点击onlyview 再点击unread
 * 需要测试先unread 在onlyview
 * 以及改变orderby之后的状态，
 * 想一个好的方法
 */
var viewUnreadOrAll = "";
var viewManName = "";

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
 * 得到未读的帖子列表
 */
function getUnreadList()
{
    $("li.hasread").hide();
    viewUnreadOrAll = "unread";
}

/*
  显示全部精简帖子列表
 （被调用在views\course\discussion\discussion.php）
 */
function getAllList()
{
    $("li.simplePost").show();
    viewUnreadOrAll = "all";
}

/*
 * 只显示某人的精简帖子列表,
 * 只显示name的帖子，并且隐藏所有匿名的帖子（被调用在views\course\discussion\simplePostList.php）
 */
function getSpecificManList(name)
{
    $("li.simplePost").hide();
    $("li.postManName_" + name).show();
    $("li.anoymous").hide();
    viewManName = name;
    if(viewUnreadOrAll == "unread") getUnreadList();
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
            //alert(viewUnreadOrAll);
            //alert(viewManName);
            if(viewUnreadOrAll == "all")
                getAllList();
            else {
                if(viewUnreadOrAll == "unread")
                    getUnreadList();
                if(viewManName != "")
                    getSpecificManList(viewManName);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}




/*
 * 回复主贴的帖子
 */
function replyPost(fatherPostId)
{
    //alert(fatherPostId);
    $.ajax({
        type: "GET",
        url: 'http://localhost:8080/course/discussion/reply-post',
        data: {fatherPostId:fatherPostId},
        success: function (data) {
            $("#create_new_followup").hide();
            $("#create_new_followup_div").html(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.statusText);
        }
    });
}