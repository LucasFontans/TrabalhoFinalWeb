<?php
    $servername = "localhost";
    $database = "piquesdb";
    $username = "root";
    $password = "";

    $nameUser = $_POST["login"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    
    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Conmection failed: " . mysqli_connect_error());
    }
    $Query1 = "SELECT email FROM usuarios";
    if(mysqli_query($conn, $Query1)){
        echo "<script>alert('email ja cadastrado!')</script>;";
        sleep(0.1);
        header("Location: ../paginas/cadastro.html");
    }
    
    $sql = "INSERT INTO usuarios (nomeUsuario, email, senha)VALUES('" . $nameUser . "', '" . $email ."', '" . $senha . "')";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Cadastro realizado com sucesso!')</script>;";
        sleep(3);
        header("Location: ../paginas/login.html");
        
    }else{
        echo "<script>alert('Erro inesperado!')</script>;";
        sleep(3);
        header("Location: ../paginas/cadastro.html");
    }
    mysqli_close($conn);