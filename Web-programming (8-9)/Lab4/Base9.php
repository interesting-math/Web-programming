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
					<legend>Добавить</legend>
					Название: <input name = "name_add" type = "text" size = "20">
					Столица: <input name = "capital_add" type = "text" size = "10">
					Площадь: <input name = "area_add" type = "text" size = "5">
					<input name = "add_country" type = "submit" value = "Add country">
				</fieldset>
				<br>
				<fieldset>
					<legend>Поиск</legend>
					Название: <input name = "name_search" type = "text" size = "20">
					Столица: <input name = "capital_search" type = "text" size = "10">
					Площадь: <input name = "area_search" type = "text" size = "5">
					<input name = "search_country" type = "submit" value = "Search country">
				</fieldset>
				
				<fieldset>
					<legend>Список</legend>
					<?php 
						echo "<select name = 'list'>\n";
					
						$file_array = file("database_9.txt");
						$delimiter = " ";
						
						$iterator = 1;
						foreach ($file_array as $value) {
							$output = explode("_", $value);
							$name = explode(".", $output[0]);
							
							echo "\t\t\t\t\t\t";
							echo "<option value = '";

							$value =  substr($value, 0, strlen($value)-1);
				
							echo $value."'>";
						
							echo "\n";
							
							for ($i = 0; $i <= 6; $i++) {
								echo "\t";
							}
							
						//	echo "\t\t\t\t\t\t";
							echo $iterator.". ";
							
							$out = "";
							foreach ($name as $value) {
								$out .= $value;
								$out .= " ";
							}
							if (strlen($out) > 0) $out = substr($out, 0, strlen($out)-1);
							echo $out;
							$output[2] =  substr($output[2], 0, strlen($output[2])-1);
							echo " | ".$output[1]." | ".$output[2]."км2"."</option>.\n";
							
							$iterator++;
						}
						echo "\t\t\t\t\t</select>";
					?>
					
					<input name = "edit" type = "submit" value = "Edit">
					<input name = "delete_country" type = "submit" value = "Delete country">
				</fieldset>
			</fieldset>
			<br>
			
		</form>
	</body>
</html>