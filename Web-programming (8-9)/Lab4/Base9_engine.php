<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Обработка запроса
		</title>
	</head>
	<body>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$add_country = $_POST['add_country'];
				$search_country = $_POST['search_country'];
				$delete_counry = $_POST['delete_country'];
				
				if ($add_country == "Add country") {
					$name_add = $_POST['name_add'];
					$capital_add = $_POST['capital_add'];
					$area_add = $_POST['area_add'];
					
					// Обработка текста (пробелы заменяем на символ '.')
					$name_add = str_replace(' ', '.', $name_add);
					$capital_add = str_replace(' ', '.', $capital_add);
					$area_add = str_replace(' ', '.', $area_add);
					
					$new_data = $name_add."_".$capital_add."_".$area_add."\n";
					
					$file_array = file('database_9.txt');
					$delimiter = "_";
					
					foreach ($file_array as $value) {
							$output = explode("_", $value);
							$output[0] = substr($output[0], 0, strlen($output[0]));
							if ($output[0] == $name_add) {
								echo "Государство с таким названием уже существует\n";
								echo '<meta http-equiv = "refresh" content = "4; url = Base9.php">';
								exit;
							}
					}
			
					$filename = 'database_9.txt';

					// Вначале давайте убедимся, что файл существует и доступен для записи.
					if (is_writable($filename)) {
						// В нашем примере мы открываем $filename в режиме "дописать в конец".
						// Таким образом, смещение установлено в конец файла и
						// наш $new_data допишется в конец при использовании fwrite().
						if (!$handle = fopen($filename, 'a')) {
							 echo "Файл ($filename) не открывается";
							 exit;
						}

						// Записываем $new_data в наш открытый файл.
						if (fwrite($handle, $new_data) === FALSE) {
							echo "Произвести запись в файл ($filename) не удалось";
							exit;
						}
						
						echo "Государство ($new_data) добавлен в файл ($filename)";
						
						fclose($handle);
					} 
					else {
						echo "Файл $filename недоступен для записи";
					}
					echo '<meta http-equiv = "refresh" content = "1; url = Base9.php">';
				}
				if ($search_country == "Search country") {
					$name_search = $_POST['name_search'];
					$capital_search = $_POST['capital_search'];
					$area_search = $_POST['area_search'];
					
					$file_array = file('database_9.txt');

					$filename = 'search.txt';
					if (is_writable($filename)) {
						// В нашем примере мы открываем $filename в режиме "дописать в конец".
						// Таким образом, смещение установлено в конец файла и
						// наш $new_data допишется в конец при использовании fwrite().
						if (!$handle = fopen($filename, 'w')) {
							 echo "Файл ($filename) не открывается";
							 exit;
						}
						
						foreach ($file_array as $value) {
								$output = explode("_", $value);
						//		if (strlen($output[0]) > 0) $output[0] = substr($output[0], 0, strlen($output[0]));
						//		if (strlen($output[1]) > 0) $output[1] = substr($output[1], 0, strlen($output[1]));
						//		if (strlen($output[2]) > 0) $output[2] = substr($output[2], 0, strlen($output[2]));
								
								$check_name = 1;
								$check_capital = 1;
								$check_area = 1;
								
								if (strlen($name_search) > 0) {
									$check_name = 0;
									if ($output[0] == $name_search) {
										$check_name = 1;
									}
								}
								if (strlen($capital_search) > 0) {
									$check_capital = 0;
									if ($output[1] == $capital_search) {
										$check_capital = 1;
									}
								}
								if (strlen($area_search) > 0) {
									$check_area = 0;
									if ($output[2] == $area_search) {
										$area_cost = 1;
									}
								}
								
								if ($check_name == 1 && $check_capital == 1 && $check_area == 1) {
										$new_data = $output[0]."_".$output[1]."_".$output[2];
										
										if (fwrite($handle, $new_data) === FALSE) {
											echo "Произвести запись в файл ($filename) не удалось<br>";
										//	exit;
										}
										echo "Государство ($new_data) добавлен в файл ($filename)<br>";		
								}
						} 
						
						// Записываем $new_data в наш открытый файл.
						fclose($handle);
						echo '<meta http-equiv = "refresh" content = "1; url = choosing.php">';
					} 
					else {
						echo "Файл $filename недоступен для записи";
					}
				}
				
				if ($edit == "Edit") {
						$option_value = $_POST['list'];
						$file_array = file('database_9.txt');
							$iterator = 1;
							foreach($file_array as $value) {
								$item = $value;
								
								if (strlen($item) > 0) $item = substr($item, 0, strlen($item)-1);
								
						
								if ($item == $option_value) {
										$prev_data = $item;
										break;
								}
								$iterator++;
							}
				
							echo '<form name = "form" action = "changing_engine.php" method = "POST">
			<fieldset>
			<legend>Страны</legend>
				<fieldset>
				<legend>Изменить</legend>'."
				";
				
							$prev_data_exploded = explode("_", $prev_data);
							echo 'Название: <input name = "name_change" type = "text" size = "20"';
							echo 'value = '; 
							
							$delimiter = " "; 
							
							$name_edit = explode(".", $prev_data_exploded[0]);
							
							$out = "'";
							foreach ($name_edit as $value) {
								$out .= $value;
								$out .= $delimiter;
							}
							if (strlen($out) > 0) $out = substr($out, 0, strlen($out)-1);
							echo $out;
							echo "'";
					
							echo '>';

							echo "
				";
							echo 'Столица: <input name = "capital_change" type = "text" size = "20"'; echo 'value = '.$prev_data_exploded[1].'>
				';
						//	echo "\t";
							echo 'Площадь: <input name = "area_change" type = "text" size = "5"'; echo 'value = '.$prev_data_exploded[2].'>';
						//	echo "\t";
							
							echo '<input type = "hidden" name = "prev_data" value = '.$option_value.'>
			<input name = "change" type = "submit" value = "Change">
		</fieldset>';
					}
				
				
				if ($delete_country == "Delete country") {
					$option_value = $_POST['list'];
					$file_array = file('database_9.txt');
					
					if (strlen($option_value) > 0) $option_value = substr($option_value, 0, strlen($option_value)-2);
					
				//	echo $option_value;
					
					$iterator = 0;
					foreach($file_array as $value) {
						$item = $value;
						
						if (strlen($item) > 0) $item = substr($item, 0, strlen($item)-1);
						
				//		echo $item.".".$option_value."<br>";
						if ($item == $option_value) {
								$prev_data = $item;
								break;
						}
						$iterator++;
					}
					
					if(isset($file_array[$iterator]))
					{
					  unset($file_array[$iterator]);
					}
					
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