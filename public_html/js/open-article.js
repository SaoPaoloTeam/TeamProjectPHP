
function takeArticleId(clicked_article){

    var article =  document.getElementById(clicked_article);
    var parent = document.getElementById("articles");
    while (parent.firstChild){
        parent.removeChild(parent.firstChild);
    }
    article.style.cursor ="auto"
    article.style.visibility ="visible";
    article.style.height = "auto";
    parent.appendChild(article);
    var fullArticle = document.getElementById(clicked_article).children;
    fullArticle[1].style.overflow = "visible";
    fullArticle[1].style.height ="auto";
    var atag = fullArticle[2].children;
    console.log(atag[2]);
    atag[2].style.visibility = "visible";
}
