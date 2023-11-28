<?php
session_start();
$id = $_SESSION['id'];
$servername = "localhost";
$database = "piquesdb";
$username = "root";
$password = "";

$valor = $_POST["valor"];

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT saldo FROM usuarios WHERE id = $id";
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error); 
}
$row = $result->fetch_assoc();
$saldo = $row['saldo'];
if (!($valor <= $saldo)) {
    echo "<script>alert('Sem saldo disponivel para sacar!'); window.location.href = '../paginas/Sacar.html';</script>";
}
$saldo = $saldo - $valor;
$query2 = "UPDATE usuarios SET saldo = $saldo WHERE id = $id";
$result = $conn->query($query2);
$sql = "INSERT INTO extrato(id, tipo, valor)VALUES($id, 'SAQUE', -$valor);";
$result = $conn->query($sql);
echo "<script>alert('Saque realizado com sucesso!'); window.location.href = '../php/dashboard.php';</script>";
?>




