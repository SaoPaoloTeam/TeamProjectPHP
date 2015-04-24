function showMenu(id) {
    document.getElementById(id).style.display = 'block';
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