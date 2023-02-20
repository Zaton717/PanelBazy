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
<div id="rekordLewo">
        <form action="dodajRekord.php" method="POST" id="tabela">
        <p class="logowanie">Tworzenie rekordu:</p><br>
        <?php
                @ session_start();
            $hostname = $_SESSION['hostname'];
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $dbname = $_SESSION['dbname'];
            $tname = $_POST['nazwaTabeli'];
            $_SESSION['tname'] = $tname;
            $conn = mysqli_connect($hostname, $username, $password, $dbname);
            $sql = "SHOW COLUMNS FROM $tname";
            $result = mysqli_query($conn, $sql);
            $i = 0;
            while($row = mysqli_fetch_assoc($result))
            {
                if($row['Field']=="id")
                {
                    echo '<input type="text" readonly class="input1" name="kolumna'. $i . '"placeholder="' . $row['Field'] .'">';
                }
                else
                {
                    echo '<input type="text" class="input1" name="kolumna'. $i . '"placeholder="' . $row['Field'] .'">';
                }
                echo '<br>';
                $i= $i+1;
            }
        $_SESSION['liczbaKolumn'] = $i;
        mysqli_close($conn);
        ?>
        <p><input type="submit" value="Utwórz" class="button2"><input type="hidden" value="1" id="liczbaKolumn" name="liczbaKolumn"></p>
    </form>
    </div>
    
    <div id="rekordPrawo">
    <form action="usunRekord.php" method="POST">
    <p class="logowanie">Usuwanie rekordu</p>   
    <p>ID rekordu:<br>
    <!-- <input type="text" class="input1" name="idRekordu"> -->

    <?php
        $conn = mysqli_connect($hostname, $username, $password,$dbname);
        $zapytanie = mysqli_query($conn,"SHOW TABLES");
        echo '<select name="idRekordu" id="selekcja" class="input1">';
        echo '<option disabled hidden selected>Wybierz rekord</option>';

        $conn = mysqli_connect($hostname, $username, $password, $dbname);
        $sql = "SELECT * FROM $tname";
        $result = mysqli_query($conn,$sql);
        $id = "SELECT id FROM $tname";
        $result3 = mysqli_query($conn,$id);
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
        $id=0;  
        echo '<option value="' . $row[$nazwa[$id]] . '">';
            for($i=0;$i<$z;$i++)
            {
                echo $row[$nazwa[$i]] . " ";
            }
            echo'</option>';
        $id = $id + $z;    
        }
        echo '</select>';
    ?>
    </p>


    <p><input type="submit" value="Usuń" class="button2"></p>
    </form>
    </div>
        </main>
        <footer><p class ="licencja">Image by <a href="https://www.freepik.com/free-vector/gradient-geometric-shapes-dark-background_6674351.htm#page=3&query=modern%20background%20abstract&position=20&from_view=keyword">Freepik</a></p></footer>
</body>
</html>