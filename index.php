<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Ksiazki</title>
</head>
<body>

		

            <h1>Dodaj książkę</h1>
            <br>
            <form action="index.php" method="Post">
            <span> Tytuł: </span><input type="text" name="Tytul" id="DTytul"><br>
            <span> Imię i nazwisko autora: </span><input type="text" id="DImie" name="Imie"><br>
            <span> Kod ISBN: </span><input type="number" name="ISBN" id="DISBN"><br>
            <span> Data wydania: </span><input type="date" name="Date" id="DDate"><br>
            <span> Ilość egzemplarzy: </span><input type="number" name="Ilosc" id="DIlosc"><br>
            <button name="Dodaj">Dodaj</button>
            </form>

					<?php
            if (isset($_POST['Dodaj'])){
                $conn=new mysqli('localhost', 'root', '', 'index');
            $tytul = $_POST['Tytul'];
            $imie = $_POST['Imie'];
            $isbn = $_POST['ISBN'];
            $date = $_POST['Date'];
            $ilosc = $_POST['Ilosc'];
            $zapytanie1 = "INSERT INTO ksiazki (Tytul, Imie_i_nazwisko, Kod_ISBN, Data_wydania, Ilosc_egzemplarzy) VALUES ('$tytul', '$imie','$isbn','$date','$ilosc')";

            $result = $conn->query($zapytanie1);
            }
            ?>

		<br><hr><br>

		<h1> Usuń książkę</h1>
		<br>
		<form action="index.php" method="Post">
		<span> Wybierz ID książki: <input type="number" id="DId" name="id"><br>
		<button name="Usun">Usun</button>

					<?php
            if (isset($_POST['Usun'])){
                $conn=new mysqli('localhost', 'root', '', 'index');
            $idk = $_POST['id'];
            $zapytanie2 = "DELETE FROM ksiazki WHERE id='$idk';";

            $result = $conn->query($zapytanie2);
            }
            ?>
		
		<br><hr><br>

		<h1>Edytuj książkę</h1>
            <br>
            <form action="index.php" method="Post">
		<span> Wybierz ID edytowanej książki: </span><input type="number" name="EID" id="EID"><br>
            <span> Tytuł: </span><input type="text" name="ETytul" id="ETytul"><br>
            <span> Imię i nazwisko autora: </span><input type="text" id="EImie" name="EImie"><br>
            <span> Kod ISBN: </span><input type="number" name="EISBN" id="EISBN"><br>
            <span> Data wydania: </span><input type="date" name="EDate" id="EDate"><br>
            <span> Ilość egzemplarzy: </span><input type="number" name="EIlosc" id="EIlosc"><br>
            <button name="Edytuj">Edytuj</button>
            </form>

					<?php
		if (isset($_POST['Edytuj'])){
                $conn=new mysqli('localhost', 'root', '', 'index');
		$EID = $_POST['EID'];
            $Etytul = $_POST['ETytul'];
            $Eimie = $_POST['EImie'];
            $Eisbn = $_POST['EISBN'];
            $Edate = $_POST['EDate'];
            $Eilosc = $_POST['EIlosc'];
            $zapytanie3 ="UPDATE ksiazki SET 
				Tytul = COALESCE(NULLIF('$Etytul', ' '), Tytul),
				Imie_i_nazwisko = COALESCE(NULLIF('$Eimie', ' '), Imie_i_nazwisko), 
				Kod_ISBN = COALESCE(NULLIF('$Eisbn', ' '), Kod_ISBN), 
				Data_wydania = COALESCE(NULLIF('$Edate', ' '), Data_wydania), 
				Ilosc_egzemplarzy = COALESCE(NULLIF('$Eilosc', ' '), Ilosc_egzemplarzy) 
				WHERE ID='$EID';
			";

            $result = $conn->query($zapytanie3);
            }

		?>


	
		<script>
function validate() {
 var REGEX = /1-9/;
 var isbn = document.getElementById("DISBN");
 var tytul = document.getElementById("DTYTUL");
 var egz = document.getElementById("DILOSC");
 if (isbn.length = 13) {
   return true; 
 }else{
 alert("Nieprawidłowe dane");
 return false;
}
if (value.match(REGEX)){
   return true; 
 }else{
 alert("Nieprawidłowe dane");
 return false;
}
if (tytul.lenght <= 128){
   return true; 
 }else{
 alert("Nieprawidłowe dane");
 return false;
}
if (egz.value != 0){
   return true; 
 }else{
 alert("Nieprawidłowe dane");
 return false;
}

}</script>

	

</body>
</html>

		