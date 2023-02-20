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

    <div id="tabelaLewo">
    <form action="modyfikujTabele.php" method="POST">
    <p class="logowanie">Modyfikowanie tabeli</p>   
    <p>Nazwa tabeli:<br>
    <?php
        @session_start();
        $hostname = $_SESSION['hostname'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $dbname = $_SESSION['dbname'];
        $conn = mysqli_connect($hostname, $username, $password,$dbname);
        $zapytanie = mysqli_query($conn,"SHOW TABLES");
        echo '<select name="nazwaTabeli" id="selekcja" class="input1">';
        echo '<option disabled hidden selected>Wybierz tabelę</option>';
        while($nazwy = mysqli_fetch_array($zapytanie))
        {
            echo '<option value="'.$nazwy[0].'">'.$nazwy[0].'</option>';
        }
        echo '</select>';
    ?>
    </p>
    <p><input type="submit" value="Modyfikuj" class="button2"></p>
    </form>
    </div>


    <div id="tabelaSrodek">
        <form action="utworzTabele.php" method="POST" id="tabela">
        <p class="logowanie">Tworzenie tabeli:</p>
        <p>Nazwa tabeli:<br><input type="text" name="nazwaTabeli" class="input1"></p>
        Nazwy kolumn <br>
		<input type="button" value="+" onClick="dodajKolumne();" class="button3">
        <input type="button" value="-" onClick="usunKolumne();" class="button3"><br>
        <input type="text" name="id" id="id" value="Id" class="input1" readonly><br>
        <input type="text" name="kolumna1" id="kolumna1" class="input1">
        <!-- <p>Nazwa kolumny 2<br><input type="text" name="kolumna2" class="input1"></p> -->
        <a id="dodaj"></a>
        <p><input type="submit" value="Utwórz" class="button2"><input type="hidden" value="1" id="liczbaKolumn" name="liczbaKolumn"></p>
    </form>
    </div>
    
    <div id="tabelaPrawo">
    <form action="usunTabele.php" method="POST">
    <p class="logowanie">Usuwanie tabeli</p>   
    <p>Nazwa tabeli:<br>
    <?php
        $conn = mysqli_connect($hostname, $username, $password,$dbname);
        $zapytanie = mysqli_query($conn,"SHOW TABLES");
        echo '<select name="nazwaTabeli" id="selekcja" class="input1">';
        echo '<option disabled hidden selected>Wybierz tabelę</option>';
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
    <br>
    <div id="tabelaSrodek2">
    <form id="wypisanie" action="wypisz.php" method="post">
    <p class="logowanie">Wypisanie tabeli</p>   
    <p>Nazwa tabeli:<br>
    <?php
        $conn = mysqli_connect($hostname, $username, $password,$dbname);
        $zapytanie = mysqli_query($conn,"SHOW TABLES");
        echo '<select name="nazwaTabeli" id="selekcja" class="input1">';
        echo '<option disabled hidden selected>Wybierz tabelę</option>';
        while($nazwy = mysqli_fetch_array($zapytanie))
        {
            echo '<option value="'.$nazwy[0].'">'.$nazwy[0].'</option>';
        }
        echo '</select>';
    ?>
    </p>
    <p><input type="submit" value="Wypisz" class="button2"></p>    
    </form>
    </div>

    <script>
        let listaKolumn = new Array();
        let listaBr = new Array();

        listaKolumn.push(document.getElementById("kolumna1"));

        function dodajKolumne()
        {
            let kreatorTabeli = document.getElementById("dodaj");

            let nowaKolumna = document.createElement("input");
            nowaKolumna.setAttribute("type", "text");
            nowaKolumna.setAttribute("class", "input1");
            listaKolumn.push(nowaKolumna);
            nowaKolumna.setAttribute("name", "kolumna"+(listaKolumn.length));
            kreatorTabeli.appendChild(nowaKolumna);
            
            let br = document.createElement("br");
            kreatorTabeli.appendChild(br);

            listaBr.push(br);
            document.getElementById("liczbaKolumn").value=listaKolumn.length;
        }

        function usunKolumne()
        {
            if(listaKolumn.length <= 1)
                return;

            let kolumna = listaKolumn.pop();
            kolumna.remove();

            let br = listaBr.pop();
            br.remove();
            if(document.getElementById("liczbaKolumn").value != 1)
            {
            document.getElementById("liczbaKolumn").value = document.getElementById("liczbaKolumn").value-1;
            }
        }
    </script>
    </main>
    <footer><p class ="licencja">Image by <a href="https://www.freepik.com/free-vector/gradient-geometric-shapes-dark-background_6674351.htm#page=3&query=modern%20background%20abstract&position=20&from_view=keyword">Freepik</a></p></footer>    
</body>
</html>