<?php
                session_start();
            $hostname = $_SESSION['hostname'];
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $dbname = $_SESSION['dbname'];
            $tname = $_SESSION['tname'];
            $conn = mysqli_connect($hostname, $username, $password, $dbname);
            $liczbaKolumn = $_SESSION['liczbaKolumn'];            
            for($i=1;$i<$liczbaKolumn;$i++)
            {
                $kolumna[$i]=$_POST['kolumna'.$i];
            }


            $sql = "INSERT INTO $tname
            VALUES ('', ";
            for($i=1;$i<$liczbaKolumn-1;$i++)
            {
                $sql= $sql . "'" . $kolumna[$i] . "',";
            }
            $sql= $sql . "'" . $kolumna[$i] . "'";
            $sql = $sql . ")";

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