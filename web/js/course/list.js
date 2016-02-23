/**
 * Created by Somefive on 2016/2/4.
 */
$(function(){
    $('.tr-enter-course').hover(function(){
        $(this).addClass('success');
    }, function(){
        $(this).removeClass('success');
    });
    $('.tr-enter-course').click(function(){
        location.href = '/course/entercourse?courseid='+$(this).attr('courseid');
    });
    $('.tr-enroll-course').hover(function(){
        $(this).addClass('info');
    }, function(){
        $(this).removeClass('info');
    });
    $('.tr-enroll-course').click(function(){
        location.href = '/course/enrollnewcourse?courseid='+$(this).attr('courseid');
    });
    $('[data-toggle="tooltip"]').tooltip();
});