<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$Ax = $_POST['Ax'];
		$Ay = $_POST['Ay'];
		
		$Bx = $_POST['Bx'];
		$By = $_POST['By'];
		
		$Cx = $_POST['Cx'];
		$Cy = $_POST['Cy'];
		
		$d1 = sqrt(($Ax - $Bx)*($Ax - $Bx) + ($Ay - $By)*($Ay - $By));
		$d2 = sqrt(($Ax - $Cx)*($Ax - $Cx) + ($Ay - $Cy)*($Ay - $Cy));
		$d3 = sqrt(($Cx - $Bx)*($Cx - $Bx) + ($Cy - $By)*($Cy - $By));
		
		echo "M<sub>1</sub>M<sub>2</sub>: ".$d1."<br>";
		echo "M<sub>1</sub>M<sub>3</sub>: ".$d2."<br>";
		echo "M<sub>2</sub>M<sub>3</sub>: ".$d3."<br>";
		
		$perimeter = $d1 + $d2 + $d3;
		echo "<b>"."Perimeter: ".$perimeter."</b>"."<br>";
	}
 ?>