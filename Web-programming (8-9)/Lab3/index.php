<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Выбор задачи
		</title>
	</head>
	<body>
		<form name = "form" action = "task selection.php" method = "GET">
			<fieldset>
				<legend>Выберите задачу, которую необходимо решить</legend>
				<select name = "list">
					<option value = "1">1. Задан треугольник координатами вершин, посчитать периметр треугольника.</option>
					<option value = "2">2. Задан треугольник длинами сторон, посчитать площадь треугольника.</option>
					<option value = "3">3. Задан треугольник координатами вершин, найти длины всех медиан.</option>
					<option value = "4">4. Задан прямоугольник координатами его диагонали, посчитать периметр и площадь прямоугольника.</option>
					<option value = "5">5. Задан четырехугольник координатами вершин, посчитать площадь четырехугольника.</option>
					<option value = "6">6. Задан треугольник длинами сторон, определить можно ли построить такой треугольник.</option>
				</select>
			</fieldset>
			<br>
			<input type = "submit" value = "Подтведить выбор">
		</form>
	</body>
</html>