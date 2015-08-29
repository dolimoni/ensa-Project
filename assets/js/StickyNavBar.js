/* 
 * StickyNavBar V 1.0
 * Author : Mohamed ESSAIDI
 * www.EssaidiM.com
 * contact : contact@essaidim.com
 */
function stickyNavBar(elm_name,stickyClass){
    var elm = $("."+elm_name);
    var elmY = $("."+elm_name).offset().top;
    $(document).ready(function(){
        document.onscroll = function (){
            if($(window).scrollTop() >= elmY+50){
                elm.addClass(stickyClass);
            }else{
                elm.removeClass(stickyClass);
            }
        };
    });
}