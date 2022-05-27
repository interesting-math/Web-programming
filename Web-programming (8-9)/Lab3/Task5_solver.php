<?php
	function Dist($P1x, $P1y, $P2x, $P2y) {
		return sqrt(($P1x - $P2x)*($P1x - $P2x) + ($P1y - $P2y)*($P1y - $P2y));
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$Ax = $_POST['Ax'];
		$Ay = $_POST['Ay'];
		
		$Bx = $_POST['Bx'];
		$By = $_POST['By'];
		
		$Cx = $_POST['Cx'];
		$Cy = $_POST['Cy'];
		
		$Dx = $_POST['Dx'];
		$Dy = $_POST['Dy'];
		
		$S = $Ax * $By + $Bx * $Cy + $Cx * $Dy + $Dx * $Ay;
		$S -= $Ay * $Bx + $By * $Cx + $Cy * $Dx + $Dy * $Ax;
		$S /= 2;
		if ($S < 0) {
			$S *= -1;
		}
		echo "Area: ".$S."<br>";
	}
 ?>