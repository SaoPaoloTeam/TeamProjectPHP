function showMenu(id) {
    document.getElementById(id).style.display = 'block';
    //console.log("TEST");
}

function hideMenu(id) {
    document.getElementById(id).style.display = 'none';
    //console.log("TEST");
}

function showArticleManager(){
    console.log('article');
    document.getElementById('article-manager').style.display = 'block';
    document.getElementById('user-manager').style.display = 'none';
    document.getElementById('form-div').style.display = 'none';
}

function showUserManager(){

    document.getElementById('article-manager').style.display = 'none';
    document.getElementById('user-manager').style.display = 'block';
    document.getElementById('form-div').style.display = 'none';
}

function showCreateNewArticle(){
    showMenu('form-div');
    document.getElementById('article-manager').style.display = 'none';
    document.getElementById('user-manager').style.display = 'none';
}


function getContent(content,title,id){
    document.getElementById('content-edit').value = content;
    document.getElementById('title-edit').value = title;
    document.getElementById('article-id').value = id;

}

function showCommentForm(el) {
    var menu = document.getElementById('comment-editor');
    if (menu.style.display == 'none') {
        menu.style.display = 'block';
        el.innerHTML = "Hide";
    } else {
        menu.style.display = 'none';
        el.innerHTML = "Post a comment";
    }
}

$(function() {
    var $document, didScroll, offset,width,positionRight;
    positionRight = Math.floor(($( window ).width()-$( ".wrapper" ).width())/2);

    offset = $('.left-aside').position().top-45;
    width = $('.left-aside').width();
    $document = $(document);
    didScroll = false;
    $(window).on('scroll touchmove', function() {
        return didScroll = true;
    });
    return setInterval(function() {
        if (didScroll) {
            $('.left-aside').toggleClass('fixed', $document.scrollTop() > offset);
            $('.right-aside').toggleClass('fixed', $document.scrollTop() > offset);
            $('.left-aside').width(width);
            $('.right-aside').width(width);
            $('.right-aside').css('right',positionRight+'px');
            //$('.right-aside').css('z-index',-1);
            $('.content-holder').toggleClass('test', $document.scrollTop() > offset);
            return didScroll = false;
        }
    }, 100);
});

function getScrollBarWidth () {
    var $outer = $('<div>').css({visibility: 'hidden', width: 100, overflow: 'scroll'}).appendTo('body'),
        widthWithScroll = $('<div>').css({width: '100%'}).appendTo($outer).outerWidth();
    $outer.remove();
    return Math.floor(100 - widthWithScroll);
};

