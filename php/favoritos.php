<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/dashboard.css">
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
        $sql = "SELECT nome,chave FROM favoritos WHERE id = $id";
        $tabela = mysqli_query($conn,$sql) or die(mysql_error($conn));
        echo "<div id= 'dashboard'>";
        echo "<h1>Favoritos</h1>";
        echo "<table>";
        echo "<tr><th>NOME</th><th>CHAVE</th></tr>";
        while($linha = mysqli_fetch_array($tabela)){
            echo "<td>";
                echo $linha["nome"] ;
            echo "</td>";
            
            echo "<td>";
                echo $linha["chave"] ;
            echo "</td></tr>";
        }
        echo "</table>";
        echo"</<div>";
        mysqli_close($conn);
    ?>
</body>
</html>