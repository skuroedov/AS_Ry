<!DOCTYPE>
<html lang="cs">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Sergey Kuroedov">
	<title>Kalkulačka pro výpočet spotřeby paliva</title>
</head>
<body>
<h1>Kalkulačka</h1>
<form action="#" method="get">
	<p>
		<label for="vzdalenost">Vzdálenost:</label>
		<input type="number" min="0" name="vzdalenost" id="vzdalenost">Km
	</p>
	<p>
		<label for="cesta_zpet">Připočítat cestu zpět</label>
		<input type="checkbox" name="cesta_zpet" id="cesta_zpet">
	</p>
	<p>
		<label for="prumerna_spotreba">Zadejte průměrnou spotřebu vozdila</label>
		<input type="number" min="0" name="prumerna_spotreba" id="prumerna_spotreba">l / 100 km
	</p>
	<p>
	<label for="cena_paliva">Zadejte cenu paliva</label>
	<input type="number" min="0" name="cena_paliva" id="cena_paliva">Kč/l
	</p>

	<input type="submit" id="submit" value="Vypočitej">
</form>
	<table>
		<tr>
			<td></td>
			<td>Spotřeba (l)</td>
			<td>Cena (Kč)</td>
		</tr>
		<tr>
			<?php
				function spotreba($x)
				{
					return $_GET['prumerna_spotreba'] * $x / 100;
				}

				if (isset($_GET['cesta_zpet'])) $k = 2;
				else $k = 1;
				$vzdalenost = $k * $_GET['vzdalenost'];
			?>
			<td><?= $vzdalenost ?> km</td>
			<?php $spotreba = spotreba($vzdalenost); ?>
			<td><?= $spotreba ?></td>
			<?php $cena = $spotreba * $_GET['cena_paliva']; ?>
			<td><?= $cena ?></td>
		</tr>
		<tr>
			<td>1 km</td>
			<td><?= spotreba(1) ?></td>
			<td><?= $spotreba * $_GET['cena_paliva'] ?></td>
		</tr>
	</table>
</body>
</html>