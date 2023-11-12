function depositar(){
    var valor = document.getElementById("valor");
    if(isNaN(valor)){
        alert("Digite um valor valido");
        return false;
    }
    return true;
}