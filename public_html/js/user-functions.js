function showMenu() {
    document.getElementById("form-div").style.display = 'block';
    console.log("TEST");
}

function showArticleManager(){

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
    showMenu();
    document.getElementById('article-manager').style.display = 'none';
    document.getElementById('user-manager').style.display = 'none';
}