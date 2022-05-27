<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Обработчик выбора базы данных
		</title>
	</head>
	<body>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			// Получаем данные от поля list
			$type = $_GET['list'];
			// Переменная $_POST хранит данные, передаваемые из формы
			
			echo '<script type = "text/javascript">'; 
			 
			if ($type == 9) echo 'window.location.href="'."Base9.php".'";'; 			

			echo '</script>'; 
		}
	?>
	</body>
</html>