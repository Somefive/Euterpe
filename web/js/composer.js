(function($){

    $.fn.composer = function(){

        $(this).find(".composer-history").addClass("glyphicon glyphicon-time").attr('contenteditable','false').attr('data-toggle','tooltip').attr('data-placement','top');
        $(this).find(".composer-note").addClass("glyphicon glyphicon-edit").attr('contenteditable','false').attr('data-toggle','tooltip').attr('data-placement','top');
        $(this).find(".composer-comment").addClass("glyphicon glyphicon-list-alt").attr('contenteditable','false').attr('data-toggle','tooltip').attr('data-placement','top');

        $(this).find(".composer-history").hide();
        $(this).find(".composer-comment").hide();
        $(this).find(".composer-note").hide();

        $(this).find(".switch").click(function(){
            if(!$(this).attr('status'))
                $(this).attr('status','off');
            var target = $('.composer-'+$(this).attr('target'));
            if($(this).attr('status')=='off'){
                target.show();
                $(this).attr('status','on');
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-default');
            }
            else{
                target.hide();
                $(this).attr('status','off');
                $(this).removeClass('btn-default');
                $(this).addClass('btn-primary');
            }
        });

        $(this).find(".op").each(
            function(){
                var op_type = $(this).attr('op-type');
                $(this).attr('data-toggle','popover').attr('data-html','true').attr('data-placement','bottom');
                $(this).attr('data-title','new '+op_type);
                $(this).attr('data-template','\
                <div class="popover" role="tooltip" style="min-width:400px;">\
                    <div class="popover-title" style="font-size:16px;"></div>\
                    <div style="margin:5px;">\
                        <textarea class="form-control" style="overflow-y: visible;"></textarea>\
                        <button type="button" class="btn btn-success" style="float:right;margin:5px;">OK</button>\
                    </div>\
                </div>\
                ');
                $(this).attr('data-content','<div><div class="input-group" style="margin:5px;"><span class="input-group-addon" id="basic-addon-add'+op_type+'">Note:</span><textarea class="form-control" placeholder="'+op_type+'Content" aria-describedby="basic-addon-add'+op_type+'"></textarea></div><div class="btn-group" role="group" style="float:right" style="margin:5px;"><button type="button" data-toggle="tooltip" class="btn btn-success">Add</button><button type="button" data-toggle="tooltip" class="btn btn-default">Cancel</button></div></div>');
            }
        );

        $(this).find('.btn-reset').click(function(){
            var composer = $(this).parents('.composer');
            composer.find('.composer-textedit').html(backup);
            composer.find('.switch[status="on"]').click();
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();

            x = $(this);
        });

        $(this).find('.btn-cancel').click(function(){
            var composer = $(this).parents('.composer');
            composer.find('.composer-textedit').html('');
            composer.find('.switch[status="on"]').click();
        });

        var backup = $(this).find(".composer-textedit").html();
        //$(this).children("span.emphasis").click(function(){
        //    var tip_target = {color:'white',backgroundColor:'black'};
        //    if($(this).attr('transit-forecolor')!=null)
        //        tip_target['color'] = $(this).attr('transit-forecolor');
        //    if($(this).attr('transit-backcolor')!=null)
        //        tip_target['backgroundColor'] = $(this).attr('transit-backcolor');
        //    var tip_origin = {color:$(this).css('color'),backgroundColor:$(this).css('backgroundColor')};
        //    $(this).animate(tip_target,'fast',function(){
        //        $(this).animate(tip_origin,'fast',function(){
        //            $(this).animate(tip_target,'fast',function(){
        //                $(this).animate(tip_origin,'fast');
        //            })
        //        })
        //    });
        //});
        //$(this).children("div.popup").click(function(){
        //    $(this).fadeOut('fast');
        //});
        //$(this).children("span.tip").click(function(){
        //    var tipid = $(this).attr('for');
        //    var divtip = $(this).parents(".composer").children("#"+tipid);
        //    if(divtip.is(":hidden"))
        //    {
        //        var spanx = $(this).position().left+$(this).width()/2, spany = $(this).position().top+$(this).height()/2;
        //        divtip.css('position','absolute');
        //        divtip.css('left',spanx);
        //        divtip.css('top',spany);
        //        divtip.fadeIn('fast',function(){
        //            $(this).animate({left:spanx-$(this).width()/2,top:spany-$(this).height()/2});
        //        });
        //    }
        //    else
        //        divtip.fadeOut('fast');
        //});
    };
})(jQuery);

$(function(){
    $('.composer').composer();
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
});

var cursor = 0;
var cursorparentobj;

document.onselectionchange = function(){
    if(document.activeElement!=$('.composer-textedit').get(0))
        return;
    cursor = window.getSelection().getRangeAt(0).startOffset;
};

function AddToCursorPos(html)
{
    var position = window.getSelection().getRangeAt(0).startOffset;
    return position;
}
