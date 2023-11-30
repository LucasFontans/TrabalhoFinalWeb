function cadastrarChave() {
    var chave = document.getElementById("chave").value;
    var escolha = document.querySelector('input[name="escolha"]:checked');

    const cpfRegex = /^\d{11}$/;

    if (isNaN(chave) || chave === "") {
        alert("Digite uma chave válida (somente números).");
        return false;
    }
    if (!escolha) {
        alert("Escolha uma opção!");
        return false;
    }
    if (escolha.value === "cpf" && !cpfRegex.test(chave)) {
        alert("CPF inválido!");
        return false;
    }

    if (escolha.value === "cpf" && !cpfRegex.test(chave)) {
        alert("CPF inválido!");
        return false;
    }

    return true;
}
