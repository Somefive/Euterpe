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
            document.getElementById("unreadDot_"+postId).style.visibility="hidden";
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