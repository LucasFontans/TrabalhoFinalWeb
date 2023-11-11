function Logar() {
    var email = document.getElementById("email");
    var senha = document.getElementById("password");

    if (email.value == "" || senha.value == "") {
        alert("Por favor, digite login e senha!");
        return false; 
    }
    return true; 
}
