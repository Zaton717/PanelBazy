<?php
                session_start();
            $hostname = $_SESSION['hostname'];
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $dbname = $_SESSION['dbname'];
            $tname = $_SESSION['tname'];
            $conn = mysqli_connect($hostname, $username, $password, $dbname);
            $id = $_POST['idRekordu'];         

            $sql = "DELETE FROM $tname WHERE id=$id";

            if($result = mysqli_query($conn, $sql))
            {
             include("poprawnaTabela.php");
            }
            else
            {
                include("odmowa.php");
            }    
            mysqli_close($conn);
?>