function validateEmail(){
    var email=document.getElementById("username").value;
    if(/^\S+@\S+$/.test(email)){
       document.getElementById("userError").innerHTML="";
        return true;
    }
    else{
        document.getElementById("userError").innerHTML="Please enter a valid email address. example@email.com";
        return false;
    }

}

