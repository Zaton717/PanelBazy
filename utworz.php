<?php
session_start();
$hostname = $_SESSION['hostname'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dbname = $_POST['nazwaBazyDanych'];
$_SESSION["dbname"] = $dbname;
$conn = mysqli_connect($hostname, $username, $password);
$utworz = "CREATE DATABASE " . "$dbname";
if(mysqli_query($conn,$utworz))
{
    include("formularzTabela.php");
} 
else
{
    include("odmowa.php");
}
?>