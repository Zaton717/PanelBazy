<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dokument</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<header></header>
<main>

<a id="wyloguj" href="index.php">Wyloguj się</a>

<div id="lewo" class="baza">

<form action="utworz.php" method="POST">
<p class="logowanie">Tworzenie bazy danych</p>    
<p>Nazwa bazy:<br><input type="text" name="nazwaBazyDanych" id="nazwaBazyDanych" class="input1"></p>
<p><input type="submit" value="Stwórz" class="button2"></p>
</form>

</div>

<div id="prawo" class="baza">
<p class="logowanie">Usuwanie bazy danych</p>       
<form action="usun.php" method="POST">

<p>Nazwa bazy:<br>
<?php
        $zapytanie = mysqli_query($conn,"SHOW DATABASES");
        echo '<select name="nazwaBazyDanych" id="selekcja" class="input1">';
        echo '<option disabled hidden selected>Wybierz bazę</option>';
        while($nazwy = mysqli_fetch_array($zapytanie))
        {
            echo '<option value="'.$nazwy[0].'">'.$nazwy[0].'</option>';
        }
        echo '</select>';
?>
</p>
<p><input type="submit" value="Usuń" class="button2"></p>
</form>

</div>

<?php
$hostname = $_POST["hostname"]; 
$username = $_POST["username"];
$password = $_POST["password"];

$_SESSION["hostname"] = $hostname;
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;

$conn = mysqli_connect($hostname, $username, $password);

function createDB($baza){

    $createDB="CREATE DATABASE " . $baza;
    mysqli_query($conn,$createDB);

    echo "Baza danych została utworzona!";

}

function deleteDB($baza){

    $deleteDB="DROP DATABASE " . $baza;
    mysqli_query($conn,$deleteDB);

    echo "Baza danych została usunięta!";

}

?>
</main>
<footer><p class ="licencja">Image by <a href="https://www.freepik.com/free-vector/gradient-geometric-shapes-dark-background_6674351.htm#page=3&query=modern%20background%20abstract&position=20&from_view=keyword">Freepik</a></p></footer>
</body>
</html>