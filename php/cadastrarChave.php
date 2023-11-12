<?php
session_start();
$id = $_SESSION['id'];
$servername = "localhost";
$database = "piquesdb";
$username = "root";
$password = "";

$chave = $_POST["chave"];
$escolha = $_POST["escolha"];

$conn = mysqli_connect($servername, $username, $password, $database);

// Use consultas preparadas para evitar injeção de SQL
$query2 = "UPDATE usuarios SET $escolha = '$chave' WHERE id = $id";

// Executa a consulta diretamente
if (mysqli_query($conn, $query2)) {
    echo "<script>alert('Cadastro realizado com sucesso!')</script>;";
    sleep(3);
    header("Location: ../php/dashboard.php");
} else {
    echo "Erro na atualização: " . mysqli_error($conn);
}

// Fecha a conexão
mysqli_close($conn);
?>
