function greeting(){
    var loginCheck=localStorage.getItem("loginName");
    const createP=document.createElement("p");
    createP.setAttribute("id","time");
    const now=new Date();
    let hour=now.getHours();
    if(loginCheck!=null){
        document.getElementById("profile").appendChild(createP);
    if (hour>=6 && hour<12){
        document.getElementById("time").innerHTML="Good morning&#127780;,";
    }
    else if (hour>=12 && hour<=18){
        document.getElementById("time").innerHTML="Good afternoon&#127774;,";
    }
    else if (hour<6 || hour>18){
        document.getElementById("time").innerHTML="Good evening&#127769;,";
    }//braces are required even for single statement conditional clauses
}
}
function logout(){
  window.localStorage.clear();
  window.location.reload(true);
  window.location.replace("../signup/sign_up.html");//REPLACES CURRENT LOCATION WITH HOME PAGE
}
function varLogin(){
    var loginCheck=localStorage.getItem("loginName");
    var namePass=document.createElement("img");
    const remover=document.getElementById("image");
    var nameBox=document.getElementById("username");
    var link1=document.getElementById("profileLink");
    var link2=document.getElementById("profile2");
    remover.innerHTML='';
    namePass.src="../profile/profilepic.jpg";
    var nameFail=document.createElement("i");
    nameFail.classList.add("fa-regular", "fa-user");
    if(loginCheck==null){//IF NO LOGIN NAME
        document.getElementById("image").appendChild(nameFail);
        document.getElementById("username").innerHTML="Login";
        document.getElementById("profile2").innerHTML="Register";
        link1.href="../signin/sign_in.html";//INSERT LOGIN PAGE LINK HERE!
        link2.href="../signup/sign_up.html";//INSERT REGISTER PAGE LINK HERE!
        nameBox.style.fontSize="16px";
    }
    else{//IF YES LOGIN NAME :)))
        document.getElementById("image").appendChild(namePass);
        namePass.style.width="55px";
        namePass.style.height="55px";
        document.getElementById("username").innerHTML=loginCheck;
        document.getElementById("profile2").innerHTML="Logout";
        link1.href="../profile/profile.html ";//INSERT PROFILE PAGE LINK HERE!
        link2.onclick=function(){logout()};
        link2.style.cursor="pointer";
        nameBox.style.fontSize="14px";
    }
}
window.onload=function(){
    varLogin();
    greeting();
}
//desired way to load/call a function upon opening a html file (simplest way aka the way benben wanted)
// document.addEventListener("DOMContentLoaded", function() {
//     greeting();
// });
//above is an advanced version of calling a function courtesy of my brother
