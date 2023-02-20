<?php
session_start();

$hostname = $_POST["hostname"]; 
$username = $_POST["username"];
$password = $_POST["password"];

$_SESSION["hostname"] = $hostname;
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;

$conn = mysqli_connect($hostname, $username, $password); //die("Nie znaleziono bazy danych".mysqli_error());
if($conn){
include("bazy.php");
}
else{
include("odmowa.php");
}
?>
