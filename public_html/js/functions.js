function loadArticles(){

    var btns = document.getElementsByClassName('main-btns');
    for (i = 0; i < btns.length; i++){
        btns[i].style.display = 'none';
    }

}

(function( $ ){
    $.fn.myfunction = function() {
        alert('hello world');
        return this;
    };
})( jQuery );