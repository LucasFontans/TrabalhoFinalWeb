<?php
session_start();
// Verifica se a sessão foi iniciada
if(isset($_SESSION['userName'])) {
    $saudacao = "Olá, " . $_SESSION['userName'] . "!";
} else {
    $saudacao = "";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/dashboard.css">
    <script src="../scripts/dasboard.js"></script>
    <title>Piques Brasil</title>
</head>
<body>
    <div id="dashboard">
        <h1>Piques Brasil</h1>
        
        <div id="saucacao">
            <?php echo htmlspecialchars($saudacao); ?>
        </div>
        <a href="../paginas/Depositar.html">Depositar</a>
        <a href="../paginas/Sacar.html">Sacar</a>
        <a href="../paginas/Extrato.html">Extrato</a>
        <a href="../paginas/Transferencia.html">Transferencia</a>
        <a href="../paginas/CadChave.html">Cadastrar Chave</a>
        <a href="../paginas/Favoritos.html">Favoritos</a>
    </div>
</body>
</html>
