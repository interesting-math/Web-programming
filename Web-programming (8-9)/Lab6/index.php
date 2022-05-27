<?php
	/* Подключение к серверу MySQL */
	$mysqli = new mysqli('localhost', 'root', 'vertrigo', 'mysql');

	if (mysqli_connect_errno()) {
	   echo "Connection error to the MySQL server. Error code: ".mysqli_connect_error();
	   exit;
	}

	if ($result = $mysqli->query("CREATE TABLE Albums(id INT, Name TINYTEXT, Artist TINYTEXT, Year SMALLINT, Genre TINYTEXT)")) {
	}
	if ($result = $mysqli->query('CREATE TABLE Songs(id INT, Name TINYTEXT, Artist TINYTEXT, Album TINYTEXT, Duration TINYTEXT)')) {
	}
	
	/* Закрываем соединение */
	$mysqli->close();
?> 

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			База данных музыкальных композиций
		</title>
	</head>
	<body>
		<form name = "form" action = "database_engine.php" method = "POST">
			<fieldset>
				<legend>Композиции</legend>
				
				<fieldset>
					<legend>Добавить альбом</legend>
					<br>
					Название: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "album_name_add" type = "text" size = "20">
					<br><br>
					Исполнитель: <input name = "album_artist_add" type = "text" size = "20">
					<br><br>
					Год:
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "album_year_add" type = "text" size = "5">
					<br><br>
					Жанр: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "album_genre_add" type = "text" size = "5"> &nbsp;&nbsp;&nbsp;
					<br><br>
					<input name = "button_add_album" type = "submit" value = "Добавить альбом">
				</fieldset>
				
				<fieldset>
					<legend>Добавить композицию</legend>
					<br>
					Название: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "song_name_add" type = "text" size = "20">
					<br><br>
					Исполнитель: 
					&nbsp;
					<input name = "song_artist_add" type = "text" size = "20">
					<br><br>
					Альбом: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "song_album_add" type = "text" size = "20">
					<br><br>
					Длительность: <input name = "song_duration_add" type = "text" size = "5"> &nbsp;&nbsp;&nbsp;
					<br><br>
					<input name = "button_add_song" type = "submit" value = "Добавить композицию">
				</fieldset>
				<br>
				<fieldset>
					<legend>Поиск альбома</legend>
					
					
					<br>
					id:
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "album_id_search" type = "text" size = "5">
					<br>
					
					
					<br>
					Название:
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "album_name_search" type = "text" size = "20">
					<br><br>
					Исполнитель: 
					<input name = "album_artist_search" type = "text" size = "20">
					<br><br>
					Год: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "album_year_search" type = "text" size = "5">
					<br><br>
					Жанр: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "album_genre_search" type = "text" size = "5">
					<br><br>
					<input name = "button_search_album" type = "submit" value = "Поиск альбома">
				</fieldset>
				<fieldset>
					<legend>Поиск композиции</legend>
					
					<br>
					id:
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<input name = "song_id_search" type = "text" size = "5">
					<br>
					
					<br>
					Название:
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "song_name_search" type = "text" size = "20">
					<br><br>
					Исполнитель: 
					&nbsp;
					<input name = "song_artist_search" type = "text" size = "20">
					<br><br>
					Альбом: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name = "song_album_search" type = "text" size = "5">
					<br><br>
					Длительность: <input name = "song_duration_search" type = "text" size = "5">
					<br><br>
					<input name = "button_search_song" type = "submit" value = "Поиск композиции">
				</fieldset>
				<br>
				<fieldset>
				<legend>Список альбомов</legend>
					<?php 
					
						$mysqli = new mysqli('localhost', 'root', 'vertrigo', 'mysql');

						if (mysqli_connect_errno()) {
						   echo "Connection error to the MySQL server. Error code: ".mysqli_connect_error();
						   exit;
						}

						if ($result = $mysqli->query("CREATE TABLE Albums(id INT, Name TINYTEXT, Artist TINYTEXT, Year SMALLINT, Genre TINYTEXT)")) {
						}
						if ($result = $mysqli->query('CREATE TABLE Songs(id INT, Name TINYTEXT, Artist TINYTEXT, Album TINYTEXT, Duration TINYTEXT)')) {
						}
							
						$selection_request = "SELECT id, name, Artist, Year, Genre FROM Albums";
						$result_of_request = $mysqli->query($selection_request);

						if ($result_of_request->num_rows > 0) {
							// output data of each row
							echo "<select name = 'album_list'>";
							
							while($row = $result_of_request->fetch_assoc()) {
								echo "<option value = '".$row["id"];
								echo $value."'>";
								echo "[".$row["name"]."] [".$row["Artist"]."] [".$row["Year"]."] [".$row["Genre"]."]";
							
							}
							
							echo "</option>";
						} 
						else {
							echo "0 results";
						}
						$mysqli->close();

						/*
						$query = "select name from almubs";
						$result = $connection->query($query);
						*/
						
						echo "\t\t\t\t\t</select>";
					?>
					<input name = "button_edit_album" type = "submit" value = "Редактировать">
					<input name = "button_delete_album" type = "submit" value = "Удалить альбом">
					
				</fieldset>
				<br>
				<fieldset>
				<legend>Список композиций</legend>
					<?php 
					
					
						$mysqli = new mysqli('localhost', 'root', 'vertrigo', 'mysql');

						if (mysqli_connect_errno()) {
						   echo "Connection error to the MySQL server. Error code: ".mysqli_connect_error();
						   exit;
						}

						if ($result = $mysqli->query("CREATE TABLE Albums(id INT, Name TINYTEXT, Artist TINYTEXT, Year SMALLINT, Genre TINYTEXT)")) {
						}
						if ($result = $mysqli->query('CREATE TABLE Songs(id INT, Name TINYTEXT, Artist TINYTEXT, Album TINYTEXT, Duration TINYTEXT)')) {
						}
							
						$selection_request = "SELECT id, name, Artist, Album, Duration FROM Songs";
						$result_of_request = $mysqli->query($selection_request);

						if ($result_of_request->num_rows > 0) {
							// output data of each row
							echo "<select name = 'song_list'>";	
							
							while($row = $result_of_request->fetch_assoc()) {
								
								echo "<option value = '".$row["id"];
								
								
								echo $value."'>";
							
								echo "[".$row["name"]."] [".$row["Artist"]."] [".$row["Album"]."] [".$row["Duration"]."]";
						
							}
							echo "</option>";
						} 
						else {
							echo "0 results";
						}
						$mysqli->close();

						/*
						$query = "select name from almubs";
						$result = $connection->query($query);
						*/
						
						echo "\t\t\t\t\t</select>";
					
					
					
					?>
					<input name = "button_edit_song" type = "submit" value = "Редактировать">
					<input name = "button_delete_song" type = "submit" value = "Удалить композицию">
					
				</fieldset>
			</fieldset>	
		</form>
	</body>
</html>