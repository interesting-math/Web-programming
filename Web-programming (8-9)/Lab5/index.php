<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			database6: Страны
		</title>
	</head>
	<body>
		<?php
			$subject = file_get_contents("http://grafika.me/node/37");
			$matches = array();
			preg_match_all("/<a ((.)*\S( )+|( )*)href( )*=( )*\"(.)*\"(.)*>/", $subject, &$matches);
			
			echo count($matches[0])."\n";
			
			for ($i = 0; $i < count($matches[0]); $i++) {
				echo "\t"."\t".$matches[0][$i]."\n";
			}
		?>
	</body>
</html>