function Logar() {
    var login = document.getElementById("login");
    var senha = document.getElementById("password");

    if (login.value == "" || senha.value == "") {
        alert("Por favor, digite login e senha!");
        return false; 
    }
    return true; 
}
