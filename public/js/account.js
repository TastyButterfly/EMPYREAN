
window.onload =profile

function register(){

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var passwordRetype = document.getElementById("cpassword").value;
    
    if (name == ""){
        alert("Name required.");
        return; 
    }
    
    else if (email == ""){
        alert("Email required.");
        return ;
    }
    else if (password == ""){
        alert("Password required.");
        return ;
    }

    else if (passwordRetype == ""){
        alert("Password required.");
        return ;
    }
    else if ( password != passwordRetype ){
        alert("Password doesn't match retype your Password.");
        return;
    }
    else{
        
        alert("Thank you for registering, "+name+".\nLogin now to enjoy the best gaming experience!");
        localStorage.setItem("email",email);
        localStorage.setItem("password",password);
        localStorage.setItem("name",name);
        window.location.href="../signin/sign_in.html";
    }

}

function login(){

    var siemail = document.getElementById("siemail").value;
    var sipassword = document.getElementById("sipassword").value;
    var siname=localStorage.getItem("name");
    var email = localStorage.getItem("email");
    var password = localStorage.getItem("password");

    if(siemail != email){
        if (siemail == ""){
            alert("Email required.");
            return ;
        }
        alert("Email does not exist.");
        return ;
    }
    else if(sipassword != password){
        if (sipassword == ""){
            alert("Password required.");
            return ;
        }
        alert("Password does not match.");
        return ;
    }
    else {
        alert("Successfully logged in!\nWelcome to our website, "+siname+".");
        localStorage.setItem("loginName",siname);
        return ;
    }
}
function profile(){

    document.getElementById("proName").innerHTML = localStorage.getItem("name");
    document.getElementById("proEmail").innerHTML = localStorage.getItem("email");
}