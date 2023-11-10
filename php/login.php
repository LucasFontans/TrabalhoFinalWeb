<?php
    function logar(){
        $servername = "localhost";
        $database = "piquesdb";
        $username = "root";
        $password = "";

        $nameUser = $_POST["login"];
        $senha = $_POST["password"];
        
        $conn = mysqli_connect($servername, $username, $password, $database);

        $nameUser = mysqli_real_escape_string($conn, $nameUser);
        $senha = mysqli_real_escape_string($conn, $senha);

        $query = "SELECT * FROM usuarios WHERE nomeUsuario = '$nameUser' AND senha = '$senha'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            sleep(3);
            header("Location: ../paginas/dashboard.html");
        } else {
            echo "<script>alert('Login ou senha inválidos!'); window.location.href = '../paginas/login.html';</script>";
        }
    }
    logar();
?>