<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Task3: Задан треугольник координатами вершин, найти длины всех медиан
		</title>
	</head>
	<body>
		<form name = "form" action = "Task3_solver.php" method = "POST">
			<fieldset>
				<legend>Task3: Задан треугольник координатами вершин, найти длины всех медиан</legend>
				M<sub>1<sub>x</sub></sub> : <input name = "Ax" type = "text" size="3">
				M<sub>1<sub>y</sub></sub> : <input name = "Ay" type = "text" size="3">
				<br>
				M<sub>2<sub>x</sub></sub> : <input name = "Bx" type = "text" size="3">
				M<sub>2<sub>y</sub></sub> : <input name = "By" type = "text" size="3">
				<br>
				M<sub>3<sub>x</sub></sub> : <input name = "Cx" type = "text" size="3">
				M<sub>3<sub>x</sub></sub> : <input name = "Cy" type = "text" size="3">
				<br>
			</fieldset>
			<br>
			<input type = "submit" value = "Вычислить">
		</form>
	</body>
</html>