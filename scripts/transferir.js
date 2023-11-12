function transferir() {
    var valor = document.getElementById("valor").value;
    var chave = document.getElementById("chave").value;
    var escolha = document.querySelector('input[name="escolha"]:checked');

    const cpfRegex = /^\d{11}$/;

    if (isNaN(chave)) {
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

    if (escolha.value === "telefone" && !cpfRegex.test(chave)) {
        alert("Telefone inválido. Formato: (DDD)x.xxxx-xxxx");
        return false;
    }

    if (isNaN(valor) || valor === "") {
        alert("Digite um valor válido!");
        return false;
    }

    return true;
}
