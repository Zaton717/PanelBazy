<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>     
</head>
<body>
    <header></header>
    <main>
    <a id="wyloguj" href="index.php">Wyloguj się</a>
    <div id="wypisanieTabeli">    
    <table>
    <?php

@ session_start();
$hostname = $_SESSION['hostname'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dbname = $_SESSION['dbname'];
$tname = $_POST['nazwaTabeli'];
$_SESSION['tname'] = $tname;
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = "SELECT * FROM $tname";
$result = mysqli_query($conn,$sql);
$kolumny = "SHOW COLUMNS FROM $tname";
            $result2 = mysqli_query($conn, $kolumny);
            $z = 0;
            echo "<tr>";
            while($row = mysqli_fetch_assoc($result2))
            {
                    $nazwa[$z] = $row['Field'];
                    print "<th>" .  $nazwa[$z] . "</th>";
                    $z= $z+1;
            }
            echo "</tr>";
           

while($row = $result->fetch_assoc())
{
    echo "<tr>";

    for($i=0;$i<$z;$i++)
    {
        echo "<td>" .  $row[$nazwa[$i]] . "</td>";

    }

    echo "</tr>";
}
?>
    </table>
    </div>
<div id="powrot">
    <form action="formularzTabela.php">
    <p><input type="submit" value="Powrót" class="button1"></p>
    <form>
</div>
    <main>
    <footer><p class ="licencja">Image by <a href="https://www.freepik.com/free-vector/gradient-geometric-shapes-dark-background_6674351.htm#page=3&query=modern%20background%20abstract&position=20&from_view=keyword">Freepik</a></p></footer>    
</body>
</html>