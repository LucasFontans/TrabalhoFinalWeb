<?php
session_start();
$id = $_SESSION['id'];
$servername = "localhost";
$database = "piquesdb";
$username = "root";
$password = "";

$escolha = isset($_POST['escolha']) ? $_POST['escolha'] : null;

$conn = mysqli_connect($servername, $username, $password, $database);

// Use consultas preparadas para evitar injeção de SQL
$query2 = "UPDATE usuarios SET $escolha = null WHERE id = $id";

// Executa a consulta diretamente
if (mysqli_query($conn, $query2)) {
    sleep(3);
    header("Location: ../php/dashboard.php");
} else {
    echo "Erro na atualização: " . mysqli_error($conn);
}

// Fecha a conexão
mysqli_close($conn);
?>