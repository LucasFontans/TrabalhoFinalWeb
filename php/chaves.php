<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/dashboard.css">
    <script src="../scripts/excluirChaves.js"></script>
    <title>Favoritos</title>
</head>
<body>
    <?php
        session_start();


        $id = $_SESSION['id'];
        $servername = "localhost";
        $database = "piquesdb";
        $username = "root";
        $password = "";
        
        $conn = mysqli_connect($servername, $username, $password, $database);
        $sql = "SELECT cpf,telefone FROM usuarios WHERE id = $id";
        $tabela = mysqli_query($conn,$sql) or die(mysql_error($conn));
        echo "<div id= 'dashboard'>";
        echo "<h1>Suas Chaves</h1>";
        echo "<form action='../php/excluir.php' method='post' onsubmit='return excluir()'>";
        echo "<table>";
        echo "<tr><th>CHAVE</th><th></th></tr>";
        $linha = mysqli_fetch_array($tabela);
            echo "<td>";
                echo $linha["cpf"] ;
            echo "</td>";
            
            echo "<td>";
                echo "<input type='radio' name='escolha' value='cpf' id='escolha'>";
            echo "</td></tr>";
            
            echo "<td>";
                echo $linha["telefone"] ;
            echo "</td>";
        
            echo "<td>";
                echo "<input type='radio' name='escolha' value='telefone' id='escolha'>";
            echo "</td></tr>";
        echo "</table>";
        echo "<input type='submit' value='Excluir Chave' id='submit'>";
        echo "</form>";
        echo"</<div>";
        mysqli_close($conn);
    ?>
</body>
</html>