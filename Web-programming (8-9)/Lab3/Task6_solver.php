<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$A = $_POST['A'];
		$B = $_POST['B'];
		$C = $_POST['C'];
		
		echo $A."<br>";
		echo $B."<br>";
		echo $C."<br>";
		
		if ($A + $B == $C || $B + $C == $A || $A + $C == $B) {
			echo "The triangle is singular."."<br>";
		}
		else {
				if ($A + $B > $C && $B + $C > $A && $A + $C > $B) {
					echo "The triangle exists."."<br>";
				}
				else {
					echo "Triangle does not exist."."<br>";
				}
		}
	}
 ?>