function depositar(){
    var valor = document.getElementById("valor").value;
    if(isNaN(valor) || valor === ""){
        alert("Digite um valor valido!");
        return false;
    }
    return true;
}