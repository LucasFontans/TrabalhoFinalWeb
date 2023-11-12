function cadastrarChave() {
    var chave = document.getElementById("chave");
    var escolha = document.getElementById("escolha");

    const cpfRegex = /^\d{11}$/;

    if (isNaN(chave.value)) {
        alert("Digite uma chave válida (somente números).");
        return false;
    }

    if (escolha.value === "cpf" && !cpfRegex.test(chave.value)) {
        alert("CPF inválido!");
        return false;
    }

    if (escolha.value === "telefone" && !cpfRegex.test(chave.value)) {
        alert("Telefone invalido. Formato: (DDD)x.xxxx-xxxx");
        return false;
    }

    return true;
}
