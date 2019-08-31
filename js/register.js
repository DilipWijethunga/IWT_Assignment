function validateTelephone() {
    var tel=document.getElementById("telno").value;
   if(tel.length>=11){
    document.getElementById("telerror").innerHTML="Error invalid number. Please re-enter using a valid 10-digit mobile number.";   
   }
    else{
        document.getElementById("telerror").innerHTML=""; 
    }
}


function validateAge(){
    var age=document.getElementById("Age").value;
    if(age<=0){
        document.getElementById("ageError").innerHTML="Please enter a valid age."
    }
    else{
        document.getElementById("ageError").innerHTML=""
    }

}

function validatepassword(){
    var password1=document.getElementById("pwd1").value;
    var password2=document.getElementById("pwd2").value;
    
    if(password1==password2){
        document.getElementById("passwordError").innerHTML=""
    }
    else{
        document.getElementById("passwordError").innerHTML="Password confirmation doesn't match."
    }
}




function validateEmail(){
    var email=document.getElementById("email").value;
    if(/^\S+@\S+$/.test(email)){
       document.getElementById("emailError").innerHTML="";
    }
    else{
        document.getElementById("emailError").innerHTML="Please enter a valid email address. example@email.com"
    }

}


 






