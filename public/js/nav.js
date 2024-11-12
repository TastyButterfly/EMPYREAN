document.addEventListener('DOMContentLoaded', function() {
    const now=new Date();
    let hour=now.getHours();
    if (hour>=6 && hour<12){
        document.getElementById("time").innerHTML="Good morning&#127780;,";
    }
    else if (hour>=12 && hour<=18){
        document.getElementById("time").innerHTML="Good afternoon&#127774;,";
    }
    else if (hour<6 || hour>18){
        document.getElementById("time").innerHTML="Good evening&#127769;,";
    }
    //braces are required even for single statement conditional clauses
});
function statusAnimation(){
    const statusMsg=document.getElementById('status');
    setTimeout(function() {statusMsg.classList.add('hide');}, 3500);
    statusMsg.addEventListener('transitionend', function() {
        statusMsg.style.display = 'none';
    });
}
//desired way to load/call a function upon opening a html file (simplest way aka the way benben wanted)
// document.addEventListener("DOMContentLoaded", function() {
//     greeting();
// });
//above is an advanced version of calling a function courtesy of my brother
