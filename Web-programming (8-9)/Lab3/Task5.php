<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Task5: Задан четырехугольник координатами вершин (в порядке обхода), посчитать площадь четырехугольника
		</title>
	</head>
	<body>
		<form name = "form" action = "Task5_solver.php" method = "POST">
			<fieldset>
				<legend>Task5: Задан четырехугольник координатами вершин (в порядке обхода), посчитать площадь четырехугольника</legend>
				M<sub>1<sub>x</sub></sub> : <input name = "Ax" type = "text" size="3">
				M<sub>1<sub>y</sub></sub> : <input name = "Ay" type = "text" size="3">
				<br>
				M<sub>2<sub>x</sub></sub> : <input name = "Bx" type = "text" size="3">
				M<sub>2<sub>y</sub></sub> : <input name = "By" type = "text" size="3">
				<br>
				M<sub>3<sub>x</sub></sub> : <input name = "Cx" type = "text" size="3">
				M<sub>3<sub>x</sub></sub> : <input name = "Cy" type = "text" size="3">
				<br>
				M<sub>4<sub>x</sub></sub> : <input name = "Dx" type = "text" size="3">
				M<sub>4<sub>x</sub></sub> : <input name = "Dy" type = "text" size="3">
				<br>
			</fieldset>
			<br>
			<input type = "submit" value = "Вычислить">
		</form>
	</body>
</html>