<?php
session_start();


$id = $_SESSION['id'];
$servername = "localhost";
$database = "piquesdb";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT saldo FROM usuarios WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$saldo = $row['saldo'];

if(isset($_SESSION['userName'])) {
    $saudacao = "Olá, " . $_SESSION['userName'] . "!";
    $saldoUsuario = "Saldo: R$" . $saldo;
} else {
    $saudacao = "";
    $saldoUsuario = "";
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
            <?php 
            echo htmlspecialchars($saudacao);
            echo "<h6>";
            echo htmlspecialchars($saldoUsuario);
            echo "</h6>";
            ?>
        </div>
        <a href="../paginas/Depositar.html">Depositar</a>
        <a href="../paginas/Sacar.html">Sacar</a>
        <a href="../php/Extrato.php">Extrato</a>
        <a href="../php/chaves.php">Suas Chaves</a>
        <a href="../paginas/Transferencia.html">Transferencia</a>
        <a href="../paginas/CadChave.html">Cadastrar Chave</a>
        <a href="../php/Favoritos.php">Favoritos</a>
    </div>
</body>
</html>
