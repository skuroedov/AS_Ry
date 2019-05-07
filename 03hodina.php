<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
<form method="get">
	<p>
		<label for="cista-mzda">Výše čisté mzdy:</label>
		<input type="number" name="cista-mzda" id="cista-mzda" required>Kč
	</p>
	<p>
		<label for="vek">Věková skupina:</label>
		<select name="vek" id="vek" required>
			<option value="do50">Do 50-ti let</option>
			<option value="5055">50 - 55 let</option>
			<option value="nad50">Nad 55 let</option>
		</select>
	</p>
	<p>
		<label for="posledni2roky12mesicu">Odpracoval/a jste během posledních dvou let alespoň dvanáct měsíců?</label>
		<select name="posledni2roky12mesicu" id="posledni2roky12mesicu" required>
			<option value="1">Ano</option>
			<option value="0">Ne</option>
		</select>
	</p>
	<p>
		<label for="hrube">Byl vám v posledních 6-ti měsících ukončen pracovní poměr pro porušení povinností zvlášť hrubým způsobem?</label>
		<select name="hrube" id="hrube">
			<option value="1">Ano</option>
			<option value="0">Ne</option>
		</select>
	</p>
	<p>
		<label for="kdovypoved">Výpověď</label>
		<select name="kdovypoved" id="kdovypoved" required>
			<option value="zamestnavatel">Zaměstnavatel</option>
			<option value="zamestnanec">Zamestnanec</option>
			<option value="dohoda">Dohoda</option>
		</select>
	</p>
	<p>
		<label for="odstupne">Odstupné</label>
		<input type="number" name="odstupne" id="number" value="0" required>platů
	</p>
	<p>
		<label for="posledni2rokypodpora">Čerpal/a jste běhěm posledních dvou let podporu v nezaměstnanosti?</label>
		<select name="posledni2rokypodpora" id="posledni2rokypodpora">
			<option value="1">Ano</option>
			<option value="0">Ne</option>
		</select>
		<label for="jakdlouhopodpora">Jak dlouho jste podporu čerpal/a?</label>
		<input type="number" name="jakdlouhopodpora" id="jakdlouhopodpora">
		<label for="prace6mesicu">Odpracoval/a jste poté alespoň 6 měsíců?</label>
		<select name="prace3mesicu" id="prace3mesicu">
			<option value="1">Ano</option>
			<option value="0">Ne</option>
		</select>
	</p>
	<p><input type="submit" name="submit"></p>
</form>
<?php
	if(isset($_GET['submit'])) {
		$mzda = $_GET['cista-mzda'];
		switch($_GET['vek']) {
			case "do50":
				$obdobi = 5;
				break;
			case "5055":
				$obdobi = 8;
				break;
			case "nad55":
				$obdobi = 11;
		}

		if($_GET['posledni2roky12mesicu'] == 0) {
			$obdobi = 0;
		}

		if($_GET['hrube'] == 1) {
			$obdobi = 0;
		}

		switch($_GET['kdovypoved']) {
			case "zamestnavatel":
				$podpora[0] = 0.65;
				$podpora[1] = 0.65;
				$podpora[2] = 0.5;
				$podpora[3] = 0.5;
				$podpora[4] = 0.45;
				$podpora[5] = 0.45;
				$podpora[6] = 0.45;
				$podpora[7] = 0.45;
				$podpora[8] = 0.45;
				$podpora[8] = 0.45;
				$podpora[10] = 0.45;
				break;
			case "zamestnanec":
				$podpora[0] = 0.45;
				$podpora[1] = 0.45;
				$podpora[2] = 0.45;
				$podpora[3] = 0.45;
				$podpora[4] = 0.45;
				$podpora[5] = 0.45;
				$podpora[6] = 0.45;
				$podpora[7] = 0.45;
				$podpora[8] = 0.45;
				$podpora[9] = 0.45;
				$podpora[10] = 0.45;
				break;
			case "dohoda":
				break;
		}

		$odstupne = $_GET['odstupne'];

		if($_GET['posledni2rokypodpora'] == 1) {
			if($_GET['prace3mesicu'] == 0) {
				$pouzito = $_GET['jakdlouhopodpora'];
			} else $pouzito = 0;
		} else $pouzito = 0;

		$mesic = 1;
		echo '<table><tbody>';
		if($odstupne > 0) {
			for ($i = 0; $i <= $odstupne; $i++) {
				echo "<tr><td>$mesic. měsíc</td><td>$mzda Kč</td></tr>";
				$mesic++;
			}
		}

		if($obdobi > 0) {
			for ($j = 0; $j < $obdobi - $pouzito ; $j++) {
				$dostanes = $mzda*$podpora[$j];
				if($dostanes > 18111) $dostanes = 18111;
				echo "<tr><td>$mesic. měsíc</td><td> $dostanes Kč</td></tr>";
				$mesic++;
			}
		}
		echo '</table></tbody>';
	}
?>
</body>
</html>