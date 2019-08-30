function validateTelephone() {
    var tel=document.getElementById("telno").value;
   if(tel.length>=11){
    document.getElementById("telerror").innerHTML="Error invalid number. Please re-enter using a valid 10-digit mobile number.";   
   }
    else{
        document.getElementById("telerror").innerHTML=""; 
    }
}

function validateDob(){
    var today = new Date();
    var dob=document.getElementById("DOB").value;
    if(parseInt(dob.substr(0,4))>today.getFullYear()){
       document.getElementById("dobError").innerHTML="Please enter a valid date of birth.";
    }
    else{
        document.getElementById("dobError").innerHTML="";
    }
}

function validateEmail(){
    var email=document.getElementById("email").value;
    if(pattern="[a-z0-9._+-] +@[a-z]{5}+/.[a-z0-9]{3}"){
       document.getElementById("emailError").innerHTML="";
       }
else{
        document.getElementById("emailError").innerHTML="Please enter a valid email address. example@email.com"
}

}



 






