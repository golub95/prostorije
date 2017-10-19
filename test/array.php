<!DOCTYPE html>
<html>
	<head>
		<title>Array</title>
	</head>
	<body>
		<!-- Forma za unos broja -->
		<form method="post" action="array.php">
			<input type="number" min="1" name="number1" placeholder="Upisite broj, max 300.">
			<input type="submit">
		</form>

		<br/>

		<?php

			// Dohvacanje korisnikovog unosa
			$number1 = $_POST['number1'];
			// Ogranicavanje max broja na 300
			if($number1 <= 300){
				// Ubacivanje korisnikovog unosa u array
				$array = range(1, $number1);
				// For petlja za prikaz arraya
				for($i = 0; $i < count($array); $i++){
					// If petlja za prikaz parnih brojeva
					if($i % 2 == 0){
						continue;
					}
					// Prikaz arraya
					echo $array[$i];
					// Dodavanje zareza iza svakog broja i brisanje za zadnji broj
					if($i < (count($array) -1)){
			      echo ", ";
			    }
				}
			}
			// Ako se upise broj veci od 300
			else {
				echo "Max number is 300.";
			}

		?>

	</body>
</html>