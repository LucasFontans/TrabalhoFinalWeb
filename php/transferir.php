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

$query2 = "SELECT saldo, nomeUsuario FROM usuarios WHERE $escolha = '$chave'";
$result1 = $conn->query($query2);
$sql = "SELECT saldo FROM usuarios WHERE id = $id";
$result2 = $conn->query($sql);

if(!($result1) && !($result2)){
    die ("Erro na consulta: " . $conn->error);
}
if($result2->num_rows === 0){
    echo "<script>alert('Chave pix não encontrada!'); window.location.href = '../paginas/transferencia.html';</script>";
}

$row = $result1->fetch_assoc();
$nomePix = $row ['nomeUsuario'];
$saldoPix = $row['saldo'];
$row = $result2->fetch_assoc();
$saldo = $row['saldo'];

if (!($valor <= $saldo)) {
    echo "<script>alert('Sem saldo disponivel para transferência!'); window.location.href = '../paginas/transferencia.html';</script>";     
}
$saldo = $saldo - $valor;
$saldoPix = $saldoPix + $valor;
$query2 = "UPDATE usuarios SET saldo = $saldo WHERE id = $id";
$result = $conn->query($query2);
$sql = "UPDATE usuarios SET saldo = $saldoPix WHERE $escolha = '$chave'";
$result = $conn->query($sql);
$sql = "SELECT * FROM favoritos WHERE chave = '$escolha: $chave'";
$result = $conn->query($sql);
if($result->num_rows === 0){
    $sql = "INSERT INTO favoritos(Id, nome, chave) VALUES($id, '$nomePix', '$escolha: $chave')";
    $result = $conn->query($sql);
}
echo "<script>alert('Transferencia realizada com sucesso!'); window.location.href = '../php/dashboard.php';</script>";
?>