<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Sergey Kuroedov">
	</head>
	<body>
		<h1>Druhá hodina</h1>
		<h2>Výpočet obsahu obdélníka</h2>
		<form method="get">
			<p>
				<label for="a">Strana a:</label>
				<input type="number" min="0" name="a" id="a" required="1">
			</p>
			<p>
				<label for="b">Strana b:</label>
				<input type="number" min="0" name="b" id="b" required="1">
			</p>
			<p>
				<input type="submit" value="Vypočítat" name="submit">
			</p>
			<?php
				if(isset($_GET['strana_a']) && isset($_GET['strana_b'])) {
					$S = $_GET['strana_a'] * $_GET['strana_b'];
					if($S > 0)
						echo("<p>Výsledek: $S</p>");
					else
						echo("Zadali jste špatné hodnoty stran");
				}
			?>
		</form>

		<h2>Kalkulačka kvadratické rovnice</h2>
		<form method="get">
			<p>
				<label for="a">a:</label>
				<input type="number" name="a" id="a" required="1">
			</p>
			<p>
				<label for="b">b:</label>
				<input type="number" name="b" id="b" required="">
			</p>
			<p>
				<label for="c">c:</label>
				<input type="number" name="c" id="c" required="">
			</p>
			<p>
				<input type="submit" name="submitKv">
			</p>
		</form>
		<?php
			if(isset($_GET['submitKv'])){
				if(isset($_GET['a']) && $_GET['a'] != 0) {
					$a = $_GET['a'];

					if(!isset($_GET['b'])) $b = 0;
					else $b = $_GET['b'];

					if(!isset($_GET['c'])) $c = 0;
					else $c = $_GET['c'];

					$D = $b*$b - (4 * $a * $c);
					if($D >= 0) {
						$x1 = (-1.0 * $b + sqrt($D)) / 2.0;
						$x2 = floatval((floatval(-1) * floatval($b) - floatval(sqrt($D))) / floatval(2));
						echo("<p>Výsledky:</p>");
						echo("<p>x1: $x1</p>");

						if($x1 != $x2) echo("<p>x2: $x2</p>");
					} else echo("Nechceme komplexní čísla.");
				}
				elseif($_GET['a'] == 0 && $_GET['b'] == 0 && $_GET['c'] == 0)
					echo "Rovnice má nekonečně mnoho řešení";

				elseif($_GET['b'] == 0 && $_GET['c'] != 0)
					echo "Rovnice nemá řešení";
				else {
					$a = $_GET['a'];
					if(!isset($_GET['b'])) $b = 0;
					else $b = $_GET['b'];
					if(!isset($_GET['c'])) $c = 0;
					else $c = $_GET['c'];
					$x = - $c / $b;
					echo("<p>Výsledky:</p>");
					echo("<p>x: $x</p>");
				}
			}
		?>
	</body>
</html>