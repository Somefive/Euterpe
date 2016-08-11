function updateRenderContentWidth(wide){
    if(wide)
        $('.render-content').width(window.screen.availWidth-$('.sidebar').width()-parseInt($('.sidebar').css("margin-left")));
    else
        $('.render-content').width(window.screen.availWidth-$('.sidebar').width());
}

function sidebarFold(fold){
    if(fold)
        $('.sidebar').animate({marginLeft:"-215px"},750,function(){updateRenderContentWidth(true);}).attr("data-value","fold");
    else{
        updateRenderContentWidth(false);
        $('.sidebar').animate({marginLeft:"0px"},750).attr("data-value","unfold");
    }
}

$(function(){
    $('.resize-sidebar').click(function(){
        if($('.sidebar').attr("data-value")=="fold")
            sidebarFold(false);
        else
            sidebarFold(true);
    }).hover(function(){
        $('.sidearrow').animate({backgroundColor: 'rgba(255,255,255,0.1)'},250);
    }, function(){
        $('.sidearrow').animate({backgroundColor: 'rgba(255,255,255,0)'},250);
    });
    $('.sidebar-btn').hover(function(){
        $(this).animate({backgroundColor: 'rgba(176,196,222,0.5)', fontSize:"20px"},250);
    }, function(){
        $(this).animate({backgroundColor: 'rgba(176,196,222,0)', fontSize:"16px"},250);
    }).click(function(){
        if($(this).attr('href'))
            window.location.href = $(this).attr('href');
    });
    updateRenderContentWidth();
});