var visnav = false;
function nav(){
    if(visnav==true) {
        $('#navigation').css('transform', 'translateX(-100%)');
        $('#tglbtn').html('<i class="icon-menu"></i>');
        visnav = false;
    }
    else {
        $('#navigation').css('transform', 'translateX(50%)');
        $('#tglbtn').html('<i class="icon-cancel"></i>');
        visnav = true;
    }
}

function scrollit(location){
    $('html, body').animate({
        scrollTop: $(location).offset().top
    }, 0);
}

function link(href){
    $(location).attr('href', href);
}