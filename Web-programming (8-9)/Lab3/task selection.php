<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Обработчик выбора задачи
		</title>
	</head>
	<body>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			// Получаем данные от поля list
			$type = $_GET['list'];
			// Переменная $_POST хранит данные, передаваемые из формы
			
			echo '<script type = "text/javascript">'; 
			
			if ($type == 1) echo 'window.location.href="'."Task1.php".'";'; 
			if ($type == 2) echo 'window.location.href="'."Task2.php".'";'; 
			if ($type == 3) echo 'window.location.href="'."Task3.php".'";'; 
			if ($type == 4) echo 'window.location.href="'."Task4.php".'";'; 
			if ($type == 5) echo 'window.location.href="'."Task5.php".'";'; 
			if ($type == 6) echo 'window.location.href="'."Task6.php".'";'; 			

			echo '</script>'; 
		}
	?>
	</body>
</html>