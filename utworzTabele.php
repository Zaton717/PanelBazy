<?php
session_start();
$hostname = $_SESSION['hostname'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dbname = $_SESSION['dbname'];
$tname = $_POST['nazwaTabeli'];
$liczbaKolumn=$_POST['liczbaKolumn'];
$conn = mysqli_connect($hostname, $username, $password, $dbname);

for($i=1;$i<$liczbaKolumn;$i++)
{
    $tabele[$i] = $_POST["kolumna$i"] ." VARCHAR(20) NOT NULL, ";
}
$tabele[$liczbaKolumn] = $_POST["kolumna$liczbaKolumn"] .' VARCHAR(20) NOT NULL)';

    $createTable = "CREATE TABLE $tname (
          id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY, ";
          for($i=1;$i<=$liczbaKolumn;$i++)
            {
                $createTable = $createTable.$tabele[$i];
            }
    
    if(mysqli_query($conn,$createTable));
    {
        include("modyfikujTabele.php");
    }
?>