<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Таблица умножения на PHP
		</title>
	</head>
	<body>
		<?php
			$s = "<table>\n";
			for ($i = 1; $i <= 10; $i++)
			{
				$s .= "<tr>";
				for ($j = 1; $j <= 10; $j++)
				{	
						$s .= "<td>";
						$s .= $j." x ".$i." = ".$i*$j;
						$s .= "</td>";
				}
				$s .= "<tr>";
			}
			$s .= "</table>";
			echo $s;
		?>
	</body>
</html>