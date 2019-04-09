<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Sergey Kuroedov">
	</head>
	<body>
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
				if(isset($_GET['a']) && isset($_GET['b'])) {
					$S = $_GET['a'] * $_GET['b'];
					if($S > 0)
						echo("<p>Výsledek: $S</p>");
					else
						echo("Zadali jste špatné hodnoty stran");
				}
			?>
		</form>
	</body>
</html>