function filterProduct(){
            
    var brand = document.getElementById("brand").value;
    var sort = document.getElementById("sort").value;
    var type = document.getElementById("select").value;
   
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
           document.getElementById("product").innerHTML = this.responseText;
        }
    };

    request.open("POST","brand.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("brand="+brand+"&sort="+sort+"&select="+type);
}

function checkLogin(){
    var is_login="<?php if(isset($_SESSION['User_Name'])){echo "1";}else{echo "0";}?>";
    if(is_login =="0"){
        document.getElementById("button_pay").disabled = true;
        document.getElementById("btn-login").click();
    }
}

function validForm() {
    var pwd = document.getElementById("pwd").value;
    var pwd_comfirm = document.getElementById("pwd_comfirm").value;
    if(pwd != pwd_comfirm){
        alert("Password and comfirm password must be the same!");
        document.getElementById("pwd").focus();
        return false;
    }
    return true;
}