function cadastrar(){
    var login = document.getElementById("login");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var repassword = document.getElementById("repassword");
    var cpf = document.getElementById("cpf");
    const cpfRegex = /^\d{11}/;

    if(!cpfRegex.test(cpf.value)){
        alert("Cpf invalido!");
        return false;
    }
    if(login.value == "" || email.value == "" || password.value == "" || repassword.value == ""){
        alert("Digite todos os camapos!");
        return false
    }
    return true
}