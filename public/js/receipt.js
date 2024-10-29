window.onload = load();

function load(){
    var price1 = sessionStorage.getItem("price");
    if (price1 == 20.00){
        localStorage.setItem("plan", "Basic (Month)");
    }
    else if (price1 == 16.67){
        localStorage.setItem("plan", "Basic (Year)");
    }
    else if (price1 == 35.00){
        localStorage.setItem("plan", "Standard (Month)");
    }
    else if (price1 == 29.17){
        localStorage.setItem("plan", "Standard (Year)");
    }
    else if (price1 == 60.00){
        localStorage.setItem("plan", "Ultimate (Month)");
    }
    else if (price1 == 50.00){
        localStorage.setItem("plan", "Ultimate (Year)");
    }


    var payment1 = localStorage.getItem("payment1");
    if (payment1 == "E-Wallet"){
        wallet();
    }
    else if (payment1 == "Credit Card"){
        credit();
    }

    
}

function wallet(){
    document.getElementById("custName").innerHTML = "Customer Name: " + localStorage.getItem("nama");
    document.getElementById("secondInfo").innerHTML = "Phone Number: " + localStorage.getItem("phone");  
    document.getElementById("thirdInfo").innerHTML = "E-Wallet: " + localStorage.getItem("wallet");
    document.getElementById("product").innerHTML = localStorage.getItem("plan");
    document.getElementById("price").innerHTML = "RM" + sessionStorage.getItem("price") + "/month";
}

function credit(){
    document.getElementById("custName").innerHTML = "Customer Name: " + localStorage.getItem("name");
    document.getElementById("secondInfo").innerHTML = "Credit Card No: " + localStorage.getItem("card");  
    document.getElementById("thirdInfo").innerHTML = "Email: " + localStorage.getItem("email");
    document.getElementById("product").innerHTML = localStorage.getItem("plan");
    document.getElementById("price").innerHTML = "RM" + sessionStorage.getItem("price") + "/month";
}