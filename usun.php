<!DOCTYPE html>
<html lang="en">
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
<?php
session_start();
$hostname = $_SESSION['hostname'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dbname = $_POST['nazwaBazyDanych'];
$conn = mysqli_connect($hostname, $username, $password);
$usun = "DROP DATABASE " . "$dbname";
mysqli_query($conn,$usun);
echo '<div id="srodek">Usunięto bazę danych <br> Przekierowywanie na stronę główną</div>' . '<br>';
?>

<script>
setTimeout(function(){ window.location.href= 'index.php';}, 2500);
</script>
</main>
<footer><p class ="licencja">Image by <a href="https://www.freepik.com/free-vector/gradient-geometric-shapes-dark-background_6674351.htm#page=3&query=modern%20background%20abstract&position=20&from_view=keyword">Freepik</a></p></footer>
</body>
</html>
