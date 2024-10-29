window.onload = init();

function init(){
   localStorage.clear();
   document.getElementById("credit").onclick = credit;
   document.getElementById("ewallets").onclick = wallets;

   document.getElementById("paymentForm").addEventListener("submit", function(event) {
      event.preventDefault();
      passDetails();
  });
}

function credit () {
   document.getElementById("nameBox").disabled = false;
   document.getElementById("emailBox").disabled = false;
   document.getElementById("cardNoBox").disabled = false;
   document.getElementById("cvv").disabled = false;
   document.getElementById("cardExpireMo").disabled = false;
   document.getElementById("cardExpireYe").disabled = false;
   document.getElementById("state").disabled = false;
   document.getElementById("zipCode").disabled = false;
   document.getElementById("wallet").disabled = true;
   document.getElementById("namaBox").disabled = true;
   document.getElementById("phoneNo").disabled = true;
   document.getElementById("pinBox").disabled = true;
   localStorage.setItem("payment1", "Credit Card");
}

function wallets() {
   document.getElementById("nameBox").disabled = true;
   document.getElementById("emailBox").disabled = true;
   document.getElementById("cardNoBox").disabled = true;
   document.getElementById("cvv").disabled = true;
   document.getElementById("cardExpireMo").disabled = true;
   document.getElementById("cardExpireYe").disabled = true;
   document.getElementById("state").disabled = true;
   document.getElementById("zipCode").disabled = true;
   document.getElementById("wallet").disabled = false;
   document.getElementById("namaBox").disabled = false;
   document.getElementById("phoneNo").disabled = false;
   document.getElementById("pinBox").disabled = false;
   localStorage.setItem("payment1", "E-Wallet");
}

function passDetails() {
   var demo = localStorage.getItem("payment1");
   if (demo == "Credit Card") {
      cred();
   }
   else if (demo == "E-Wallet") {
      wall();
   }
}

function cred() {
   var name1 = document.getElementById("nameBox");
   localStorage.setItem("name",name1.value);
   var card1 = document.getElementById("cardNoBox")
   localStorage.setItem("card",card1.value);
   var email1 = document.getElementById("emailBox")
   localStorage.setItem("email",email1.value);
   window.location.href = "receipt.html";
}

function wall() {
   var nama1 = document.getElementById("namaBox");
   localStorage.setItem("nama",nama1.value);
   var phone11 = document.getElementById("phoneNo");
   localStorage.setItem("phone",phone11.value);
   var wallet1 = document.getElementById("wallet")
   localStorage.setItem("wallet",wallet1.value);
   window.location.href = "receipt.html";
}