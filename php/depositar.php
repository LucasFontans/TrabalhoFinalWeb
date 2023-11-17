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


if (!($result)) {
    echo "Erro na consulta: " . $conn->error;
}
$row = $result->fetch_assoc();
$saldo = $row['saldo'];
$saldo = $saldo + $valor;
$query2 = "UPDATE usuarios SET saldo = $saldo WHERE id = $id";
$result = $conn->query($query2);
echo "<script>alert('Deposito realizado com sucesso!'); window.location.href = '../php/dashboard.php';</script>";
?>