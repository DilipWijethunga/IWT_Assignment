function validateTelephone(){
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
       document.getElementById("dobError").innerHTML="Please enter a valid email.example@email.com.";
    }
    else{
        
    }
}