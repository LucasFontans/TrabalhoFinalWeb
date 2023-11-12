function cadastrar(){
    var login = document.getElementById("login");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var repassword = document.getElementById("repassword");
    
    if(login.value == "" || email.value == "" || password.value == "" || repassword.value == ""){
        alert("Digite todos os camapos!");
        return false;
    }
    if(!(password.value == repassword.value)){
        alert("Senhas não conferem!");
        return false;
    }
    return true;
}

