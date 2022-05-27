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
		
		$P1x = ($Bx + $Cx)/2;
		$P1y = ($By + $Cy)/2;
		
		$P2x = ($Ax + $Cx)/2;
		$P2y = ($Ay + $Cy)/2;
		
		$P3x = ($Ax + $Bx)/2;
		$P3y = ($Ay + $By)/2;
		
		$d1 = Dist($Ax, $Ay, $P1x, $P1y);
		$d2 = Dist($Bx, $By, $P2x, $P2y);
		$d3 = Dist($Cx, $Cy, $P3x, $P3y);
		
		echo "D1: ".$d1."<br>";
		echo "D2: ".$d2."<br>";
		echo "D3: ".$d3."<br>";
	}
 ?>