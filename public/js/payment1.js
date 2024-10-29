window.onload = init;


function init() {
   document.getElementById("basicMonth").onclick = basicMonthly;
   document.getElementById("basicYear").onclick = basicYearly;
   document.getElementById("standardMonth").onclick = standardMonthly;
   document.getElementById("standardYear").onclick = standardYearly;
   document.getElementById("ultimateMonth").onclick = ultimateMonthly;
   document.getElementById("ultimateYear").onclick = ultimateYearly;
   document.getElementById("nextPage").onclick = myFunction;
    

}
function basicMonthly() {
   document.getElementById("basicYear").checked = false;
   document.getElementById("standardMonth").checked = false;
   document.getElementById("standardYear").checked = false;
   document.getElementById("ultimateMonth").checked = false;
   document.getElementById("ultimateYear").checked = false;
}

function basicYearly() {
   document.getElementById("basicMonth").checked = false;
   document.getElementById("standardMonth").checked = false;
   document.getElementById("standardYear").checked = false;
   document.getElementById("ultimateMonth").checked = false;
   document.getElementById("ultimateYear").checked = false;
}

function standardMonthly() {
   document.getElementById("basicMonth").checked = false;
   document.getElementById("basicYear").checked = false;
   document.getElementById("standardYear").checked = false;
   document.getElementById("ultimateMonth").checked = false;
   document.getElementById("ultimateYear").checked = false;
}

function standardYearly() {
   document.getElementById("basicMonth").checked = false;
   document.getElementById("standardMonth").checked = false;
   document.getElementById("basicYear").checked = false;
   document.getElementById("ultimateMonth").checked = false;
   document.getElementById("ultimateYear").checked = false;
}

function ultimateMonthly() {
   document.getElementById("basicMonth").checked = false;
   document.getElementById("standardMonth").checked = false;
   document.getElementById("standardYear").checked = false;
   document.getElementById("basicYear").checked = false;
   document.getElementById("ultimateYear").checked = false;
}

function ultimateYearly() {
   document.getElementById("basicMonth").checked = false;
   document.getElementById("standardMonth").checked = false;
   document.getElementById("standardYear").checked = false;
   document.getElementById("ultimateMonth").checked = false;
   document.getElementById("basicYear").checked = false;
}

function myFunction(event){
   if (document.getElementById("basicMonth").checked == false &&
   document.getElementById("standardMonth").checked == false &&
   document.getElementById("standardYear").checked == false &&
   document.getElementById("ultimateMonth").checked == false&&
   document.getElementById("basicYear").checked == false &&
   document.getElementById("ultimateYear").checked == false) {
   alert("Please select a subcription!");
   event.preventDefault();
   }
   else {
      if (document.getElementById("basicMonth").checked == true){
         const price = 20.00;
         sessionStorage.setItem('price', price);
         window.location.href = "Payment2.html";
                 
      }
      else if (document.getElementById("basicYear").checked == true){
         const price = 16.67;
         sessionStorage.setItem('price', price); 
         window.location.href = "Payment2.html";      
      }
      else if (document.getElementById("standardMonth").checked == true){
         const price = 35.00;
         sessionStorage.setItem('price', price);
         window.location.href = "Payment2.html";        
      }
      else if (document.getElementById("standardYear").checked == true){
         const price = 29.17;
         sessionStorage.setItem('price', price);
         window.location.href = "Payment2.html";       
      }
      else if (document.getElementById("ultimateMonth").checked == true){
         const price = 60.00;
         sessionStorage.setItem('price', price);
         window.location.href = "Payment2.html";        
      }
      else if (document.getElementById("ultimateYear").checked == true){
         const price = 50.00;
         sessionStorage.setItem('price', price);
         window.location.href = "Payment2.html";      
      }
   }
}
