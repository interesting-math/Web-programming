<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$A = $_POST['A'];
		$B = $_POST['B'];
		$C = $_POST['C'];
		
		$p = ($A+$B+$C)/2;
		$S = sqrt($p*($p-$A)*($p-$B)*($p-$C));
		
		echo $A."<br>";
		echo $B."<br>";
		echo $C."<br>";
		echo $p."<br>";
		
		echo "<b>"."Area: ".$S."</b>"."<br>";
	}
 ?>