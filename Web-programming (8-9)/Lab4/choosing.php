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
		<form name = "form" action = "Base9_engine.php" method = "POST">
		
			<fieldset>
				<legend>Страны</legend>
				
				<fieldset>
					<legend>Список</legend>
					<?php 
						echo "<select name = 'list'><br>";
					
						$file_array = file("search.txt");
						$delimiter = " ";
						
						$iterator = 1;
						foreach ($file_array as $value) {
							$output = explode("_", $value);
							$name = explode(".", $output[0]);
							
							echo "<option value = '";
							
							$value = substr($value, 0, strlen($value)-1);
							echo $value."'>";
							
							echo $iterator.". ";
							
							$out = "";
							foreach ($name as $value) {
								$out .= $value;
								$out .= " ";
							}
							if (strlen($out) > 0) $out = substr($out, 0, strlen($out)-1);
							echo $out;
							$output[2] = substr($output[2], 0, strlen($output[2])-1);
							echo " | ".$output[1]." | ".$output[2]." км2"."</option>"."<br>";
							
							$iterator++;
						}
						echo "</select>";
					?>
					
					<input name = "edit" type = "submit" value = "Edit">
				</fieldset>
			</fieldset>
		</form>
	</body>
</html>