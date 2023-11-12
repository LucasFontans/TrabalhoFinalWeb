<?php
session_start();

function logar(){
    $servername = "localhost";
    $database = "piquesdb";
    $username = "root";
    $password = "";

    $email = $_POST["email"];
    $senha = $_POST["password"];
    $nameUser;
    $id;

    $conn = mysqli_connect($servername, $username, $password, $database);

    $email = mysqli_real_escape_string($conn, $email);
    $senha = mysqli_real_escape_string($conn, $senha);

    $query2 = "SELECT id, nomeUsuario FROM usuarios WHERE email = '$email'";
    $result2 = $conn->query($query2);

    if ($result2->num_rows == 1) {
        $row = $result2->fetch_assoc();
        $nameUser = $row['nomeUsuario'];
        $id = $row['id'];
    } else {
        // Se não encontrar o usuário, você pode definir um valor padrão ou tomar outra ação, como redirecionar para a página de login
        $nameUser = "Usuário não encontrado";
    }

    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $_SESSION['id'] = $id;
        $_SESSION['userName'] = $nameUser;
        sleep(3);
        header("Location: ../php/dashboard.php");
    } else {
        echo "<script>alert('Login ou senha inválidos!'); window.location.href = '../paginas/login.html';</script>";
    }
}

logar();
?>
