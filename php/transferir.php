<?php
session_start();
$id = $_SESSION['id'];
$servername = "localhost";
$database = "piquesdb";
$username = "root";
$password = "";

$valor = $_POST["valor"];
$chave = $_POST["chave"];
$escolha = isset($_POST['escolha']) ? $_POST['escolha'] : null;

$conn = mysqli_connect($servername, $username, $password, $database);

$query2 = "SELECT saldo FROM usuarios WHERE $escolha = '$chave";
$result = $conn->query($query2);

if($result){
    $row = $result->fetch_assoc();
    $saldoPix = $row['saldo'];
    $sql = "SELECT saldo FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $saldo = $row['saldo'];

        if (($valor <= $saldo)) {
            $saldo = $saldo - $valor;
        } else {
            echo "<script>alert('Sem saldo disponivel para sacar!'); window.location.href = '../paginas/transferencia.html';</script>";
        }
    } 
}else {
    echo "Erro na consulta: " . $conn->error;
}
?>