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
        $sql = "SELECT tipo,valor FROM extrato WHERE id = $id";
        $tabela = mysqli_query($conn,$sql) or die(mysql_error($conn));
        echo "<div id= 'dashboard'>";
        echo "<h1>Extrato</h1>";
        echo "<table>";
        echo "<tr><th>TIPO DE TRANSAÇÃO</th><th>VALOR</th></tr>";
        while($linha = mysqli_fetch_array($tabela)){
            echo "<td>";
                echo $linha["tipo"] ;
            echo "</td>";
            
            echo "<td>";
                echo 'R$    ' . $linha["valor"] ;
            echo "</td></tr>";
        }
        echo "</table>";
        echo"</<div>";
        mysqli_close($conn);
    ?>
</body>
</html>