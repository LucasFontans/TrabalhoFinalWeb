function excluir(){
    var esc = document.getElementById("escolha").value;

    if(esc == ""){
        alert("Escolha uma opção!");
        return false;
    }
    return true;
}                           