<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Обработка запроса: изменение записи в базе данных
		</title>
	</head>
	<body>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$change_buton_was_pressed = $_POST['change'];
				
				if ($change_buton_was_pressed == "Change") {
						$prev_data = $_POST['prev_data'];
						
						$file_array = file('database_9.txt');
						
						$name_change = $_POST['name_change'];
						$capital_change = $_POST['capital_change'];
						$area_change = $_POST['area_change'];
						
				/*		echo $name_change."<br>";
						echo $capital_change."<br>";
						echo $area_change."<br>";
				*/		
						$iterator = 0;
						foreach ($file_array as $value) {
				//			echo $value."*".$prev_data."*"."<br>";
							
							if (substr($value, 0, strlen($value)-1) == $prev_data) {
								break;
							}
							$iterator++;
						}
				//		echo $iterator;
						
						$name_change = str_replace(" ", ".", $name_change);
						$capital_change = str_replace(" ", ".", $capital_change);
						$area_change = str_replace(" ", ".", $area_change);
						
						$new_data = $name_change."_".$capital_change."_".$area_change."\n";
						
				//		echo $new_data;
						
						$file_array[$iterator] = $new_data;
					
						echo $file_array[$iterator];
						
						$filename = "database_9.txt";
						file_put_contents('database_9.txt', '');
						
						$handle = fopen($filename, "a");
						
						foreach ($file_array as $output) {
						//	echo $output."<br>";
							
							if (fwrite($handle, $output) === FALSE) {
								echo "Произвести запись в файл ($filename) не удалось<br>";
							//	exit;
							}	
						}
						echo "Государство ($output) добавлен в файл ($filename)<br>";		
						fclose($handle);
						echo '<meta http-equiv = "refresh" content = "1; url = Base9.php">';
				}
			}
		 ?>
 	</body>
</html>