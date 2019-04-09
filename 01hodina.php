<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Sergey Kuroedov">
	<style>
		.zelene {
			background-color: #34ce57;
		}
		td {
			text-align: center;
		}

		table, td {
			border: 1px solid black;
			border-spacing: 0;
		}
	</style>
</head>
<body>
<h1>První stránka v php</h1>
<?php
	print("<h2>Hello PHP</h2>");
	$a = 2;
	if ($a > 0) {
		print("Číslo $a je kladné.");
	} elseif ($a == 0) {
		print("Číslo je nula");
	} else {
		print("Číslo je záporné");
	}
	print("<br>");
	for ($i = 0; $i <= 10; $i++) {
		echo("$i, ");
	}

	$min = 6;
	$max = 628;

	echo("<p>Sudá čísla: </p>");
	for ($j = $min; $j <= $max; $j = $j + 2) {
		echo("$j");
		if ($j < $max)
			echo(", ");
	}
?>
<form method="get">
	<label for="number">X:</label>
	<input type="number" name="x">
	<label for="number">Y:</label>
	<input type="number" name="y">
	<input type="submit">
</form>
<table>
	<?php
		$x = $_GET['x'];
		$y = $_GET['y'];
		
		for ($i = 0; $i <= $x; $i++) {
			echo('<td class="zelene">');
			if ($i != 0)
				echo($i);
			echo('</td>');
		}
		for ($i = 1; $i <= $y; $i++) {
			echo('<tr>');
			echo('<td class="zelene">' . $i . '</td>');
			for ($j = 1; $j <= $x; $j++) {
				echo('<td>' . $i * $j . '</td>');
			}
		}
	?>
</table>
</body>
</html>
