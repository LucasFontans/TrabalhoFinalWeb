<?php
    function criarUsuario(){
    $servername = "localhost";
    $database = "piquesdb";
    $username = "root";
    $password = "";

    $nameUser = $_POST["login"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    $controle = true;

    if(!$conn){
        die("Conmection failed: " . mysqli_connect_error());
    }
    
    $queryNameUser = "SELECT * FROM usuarios WHERE nomeUsuario = '$nameUser'";
    $resultNameUser = $conn->query($queryNameUser);

    $queryEmail = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultEmail = $conn->query($queryEmail);

    if ($resultNameUser->num_rows > 0) {
        echo "<script>alert('Nome de usuario ja em uso!'); window.location.href = '../paginas/cadastro.html';</script>";
        $controle = false;
    }

    if ($resultEmail->num_rows > 0) {
        echo "<script>alert('Email ja em uso!'); window.location.href = '../paginas/cadastro.html';</script>";
        $controle = false;
    }
    
    if($controle){
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
    }    
    mysqli_close($conn);
}
    criarUsuario();
    