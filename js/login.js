function validate(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
  
    if(username =="" || password ==""){
        alert = ("You can't leave empty spaces");
        return false;
    }
else{
    return true;
}
}
