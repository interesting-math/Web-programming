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
				<legend>Изменить</legend>';
				
				
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

							echo "\t";
							echo 'Столица: <input name = "capital_change" type = "text" size = "20"'; echo 'value = '.$prev_data_exploded[1].'>';
							echo "\t";
							echo 'Площадь: <input name = "area_change" type = "text" size = "5"'; echo 'value = '.$prev_data_exploded[2].'>';
							echo "\t";
							
							echo '<input type = "hidden" name = "prev_data" value = '.$option_value.'>
			<input name = "change" type = "submit" value = "Change">
		</fieldset>';
					}