<?php
	/* Подключение к серверу MySQL */
	$mysqli = new mysqli('localhost', 'root', 'vertrigo', 'mysql');

	if (mysqli_connect_errno()) {
	   echo "Ошибка подключения к серверу MySQL. Код ошибки:".mysqli_connect_error();
	   exit;
	}

	if ($result = $mysqli->query("CREATE TABLE Albums(Name TINYTEXT, Artist TINYTEXT, Year SMALLINT, Genre TINYTEXT)")) {
		mysqli_free_result($result);
	}
	if ($result = $mysqli->query('CREATE TABLE Songs(Name TINYTEXT, Artist TINYTEXT, Album TINYTEXT, Duration TINYTEXT)')) {
		mysqli_free_result($result);
	}
	
	/* Закрываем соединение */
	$mysqli->close();
?> 
