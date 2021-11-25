function onLoad(){
    cookie = document.cookie
    if(document.cookie){
       window.location.replace("./home.php");
    }else{
        window.location.replace("./login.php")
    }
}
