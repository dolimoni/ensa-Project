function e_doScripts(){
    // Position the singnup top
    if (typeof $('#e_signup').offset() !== "undefined") {
        $('#e_signup .e_title').css('top',-$('#e_signup .e_title').height()/2+"px");
    }
}

// Square Elm => width = height
function e_squareElment(selecter){
    $(selecter).height($(selecter).width());
    $(selecter).width($(selecter).height());
}

// Center Elm horizentally
function e_centerHorz(elm,parent,offset){
    $(elm).css('left',$(parent).width()/2-$(elm).width()/2+offset+"px");
}
// Center Elm Vertically
function e_centerVert(elm,parent,offset){
    $(elm).css('top',$(parent).height()/2-$(elm).height()/2+offset+"px");
}
// Center Elm horizentally and vertically
function e_centerBoth(elm,parent,offsetH,offsetV){
    e_centerVert(elm,parent,offsetV);
    e_centerHorz(elm,parent,offsetH);
}

//Execute this function when the window loaded
$(window).ready(e_doScripts);

//Execute this every time the screen size changes
$(window).resize(e_doScripts);