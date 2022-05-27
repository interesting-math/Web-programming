<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Продукты на PHP
		</title>
	</head>
	<body>
		<?php
			// ассоциативный массив продуктов и их цен
			$food["Apple"] = 30;
			$food["Banana"] = 130;
			$food["Cherry"] = 30;
			$food["Coconut"] = 130;
			$food["Kiwi"]= 230;
			$food["Pineapple"] = 90;
			$food["Lime"] = 90;
			$food["Lemon"] = 50;
			$food["Mango"] = 130;
			$food["Olive"] = 90;
			$food["Peach"] = 50;
			$food["Avocado"] = 230;
			$food["Cucumber"] = 30;
			$food["Carrot"] = 10;
			$food["Tomato"] = 10;
			$food["Cabbage"] = 20;
			$food["Potatoes"] = 40;
			$food["Pepper"] = 50;
			$food["Turnip"] = 20;
			$food["Haricot"] = 10;
			 
			$INF = 1E18; 
			 
			// Функция сравнения
			function cmp($a, $b) {
				if ($a == $b) {
					return 0;
				}
				return ($a < $b) ? -1 : 1;
			} 
			 
			echo "<b>Original:</b><br>";
			Out_Array($food);
			// Перенос строки
			echo nl2br("\n");
			
			// Сортируем
			uasort($food, 'cmp');
			
			echo "<b>Sorted:</b><br>";
			// Выводим массив
			Out_Array($food);
			
			// Перенос строки
			echo nl2br("\n");
			
			echo "1. Найдите 5 самых дешевых продуктов.<br>";
			
			function Task1($food, $cnt) {
				$iterator = 0;
				foreach ($food as $key => $value) {
					if ($iterator >= $cnt) {
							break;
					}
					echo "<p>".$key.", cost: ".$value."<br>"."</p>";
					$iterator++;
				}
			}
			
			Task1($food, 5);
			
			echo nl2br("2. Найдите 5 самых дорогих продуктов.\n");
			
			function Task2($food, $cnt) {
				$size_of_array = count($food);
				$iterator = 0;
				foreach ($food as $key => $value) {
					if ($iterator < $size_of_array - $cnt) {
							$iterator++;
							continue;
					}
					echo "<p>".$key.", cost: ".$value."<br>"."</p>";
					$iterator++;
				}
			}
			
			Task2($food, 5);
			
			echo nl2br("3. Найдите продукты с одинаковой ценой.\n");
			
			function Task3($food) {
				$iterator = 0;
				foreach ($food as $key => $value) {
					$arr[$iterator] = $value;
					$iterator++;
				}
				$uniq = array_unique($arr);
				foreach ($uniq as $key => $value) {
					echo "<b>"."Cost: ".$value."<br>"."</b>";
					foreach ($food as $key1 => $value1) {
						if ($value1 == $value) {
							echo nl2br("<p>".$key1."<br>"."</p>");
						}
					}
				}
			}
			
			Task3($food);
			
			echo nl2br("4. Найдите пары продуктов цены которых отличаются не более, чем на 10 рублей.\n");
			
			function Task4($food, $dist) {
				$iterator1 = 0;
				foreach ($food as $key1 => $value1) {
					$iterator2 = 0;
					foreach ($food as $key2 => $value2) {
						$d = $value1 - $value2;
						if ($d < 0) {
							$d *= -1;
						}
						if ($d <= $dist && $iterator1 < $iterator2) {
								echo nl2br ("<p>".$key1." ".$key2.", bias: ".$d."\n"."</p>");
						}
						$iterator2++;
					}					
					$iterator1++;
				}
			}
			
			Task4($food, 10);
			
			echo nl2br("5. Найдите два продукта разность в цене у которых минимальна, но не с одинаковой стоимостью.\n");
			
			function Task5($food, $INF) {
					$min_difference = $INF;
					foreach ($food as $key1 => $value1) {
						foreach ($food as $key2 => $value2) {
							$cur_difference = $value1 - $value2;
							if ($cur_difference < 0) {
								$cur_difference *= -1;
							}
							if ($cur_difference < $min_difference && $cur_difference != 0) {
								$min_difference = $cur_difference;
							}
						}
					}
					echo "<b>"."Min difference: ".$min_difference."</b>"."<br>";
					$iterator1 = 0;
					foreach ($food as $key1 => $value1) {
						$iterator2 = 0;
						foreach ($food as $key2 => $value2) {
							$cur_difference = $value1 - $value2;
							if ($cur_difference < 0) {
								$cur_difference *= -1;
							}
							if ($min_difference == $cur_difference && $iterator1 < $iterator2) {
								echo "<p>".$key1." - ".$key2."</p>";
							}
							$iterator2++;
						}
						$iterator1++;
					}
			}
			
			Task5($food, $INF);
			
			echo nl2br("6. Поменяйте местами цены у самого дорого и самого дешевого продукта.\n");
			
			function Out_Array($food) {
				foreach ($food as $key => $value) {
						echo nl2br ("<p>".$key.", Cost: ".$value."\n"."</p>");
				}
			}
			
			function Task6($food, $INF) {
				$minv = $INF;
				$maxv = -$INF;
				
				foreach ($food as $key => $value) {
						if ($value > $maxv) {
							$maxv = $value;
						}
						if ($value < $minv) {
							$minv = $value;
						}
				}
				// &$value - значение присваивается по ссылке
				foreach ($food as $key => &$value) {
					if ($value == $minv) {
						$value = $maxv;
					}
					else {
						if ($value == $maxv) {
								$value = $minv;
						}
					}
				}
				Out_Array($food);
			}
			
			Task6($food, $INF);
			
			echo nl2br("7. Какие продукты больше всего раз совпадают по цене.\n");
			
			function Task7($food) {
				$max_cnt = 0;
				$iterator = 0;
				foreach ($food as $key => $value) {
					$arr[$iterator] = $value;
					$iterator++;
				}
				$uniq = array_unique($arr);
				
				$iterator = 0;
				foreach ($uniq as $key => $cost) {
					$cur_cnt = 0;
					foreach ($food as $key1 => $value1) {
						if ($value1 == $cost) {
							$cur_cnt++;
						}
					}
					$cnt[$iterator] = $cur_cnt;
					$iterator++;
				}
				
				// Находим максимальное количество появлений среди всех цен
				
				foreach ($cnt as $key => $value) {
					if ($max_cnt < $value) {
						$max_cnt = $value;
					}
					$iterator++;
				}
				echo "<b>Max_Cnt: ".$max_cnt."</b>"."<br>";
				$iterator = 0;
				foreach ($cnt as $key => $value) {
						if ($max_cnt == $value) {
								$iterator1 = 0;
								$cur_cost = 0;
								foreach ($uniq as $pos => $cost) {
									if ($iterator == $iterator1) {
										$cur_cost = $cost;
										break;
									}
									$iterator1++;
								}
								echo "<b>Cost: ".$cur_cost."</b><br>";
								foreach ($food as $key1 => $value1) {
									if ($value1 == $cur_cost) {
										echo "<p>".$key1."</p>";
									}
								}
						}
						$iterator++;
				}
			}
			
			Task7($food);
			
			echo nl2br("8. Перечислите все продукты с несовпадающими ценами.\n");
			
			function Task8($food) {
				$iterator1 = 0;
				foreach ($food as $key1 => $value1) {
					$iterator2 = 0;
					foreach ($food as $key2 => $value2) {
						$d = $value1 - $value2;
						if ($d < 0) {
							$d *= -1;
						}
						if ($d != $dist && $iterator1 < $iterator2) {
								echo nl2br ("<p>".$key1." ".$key2.", bias: ".$d."\n"."</p>");
						}
						$iterator2++;
					}					
					$iterator1++;
				}
			}
			Task8($food);
			
			
			echo nl2br("9. Найдите продукт, стоимость которого ближе всего к среднему арифметическому стоимости всех продуктов.\n");
			
			function Task9($food, $INF) {
				$arange = 0;
				$cnt = 0;
				foreach ($food as $key => $value) {
					$arange += $value;
					$cnt++;
				}
				$arange /= $cnt;
				echo nl2br("Arange: ".$arange."\n");
				
				$min_d = $INF;
				
				$interator = 0;
				foreach ($food as $key => $value) {
					$bias = $value - $arange;
					if ($bias < 0) {
						$bias *= -1;
					}
					if ($bias < $min_d) {
						$min_d = $bias;
					}
					$iterator++;
				}
				echo nl2br("<b>The nearest goods at cost:</b>\n");
				foreach ($food as $key => $value) {
						$bias = $value - $arange;
						if ($bias < 0) {
							$bias *= -1;
						}
						if ($bias == $min_d)
						{
								echo nl2br("<p>".$key.", cost: ".$value.", bias: ".$bias."\n"."</p>");
						}
				}
			}
			
			Task9($food, $INF);
			
		?>
	</body>
</html>