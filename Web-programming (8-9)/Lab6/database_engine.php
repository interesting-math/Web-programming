<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "style.css" rel = "stylesheet">
		<title>
			Обработка запроса
		</title>
	</head>
	<body>
		<?php
			/* Подключение к серверу MySQL */
			$mysqli = new mysqli('localhost', 'root', 'vertrigo', 'mysql');

			if (mysqli_connect_errno()) {
			   echo "Ошибка подключения к серверу MySQL. Error codes:".mysqli_connect_error();
			   exit;
			}
			
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$button_add_album = $_POST['button_add_album'];
				
				if ($button_add_album == "Добавить альбом") {
					$album_name_add = $_POST['album_name_add'];
					$album_artist_add = $_POST['album_artist_add'];
					$album_year_add = $_POST['album_year_add'];
					$album_genre_add = $_POST['album_genre_add'];
								
			//		SELECT * FROM albums WHERE Name = $album_name_add AND Artist = $album_artist_add AND Year = $album_year_add AND Year = $album_year_add ; 			
				
					$strSQL = "INSERT INTO albums(";

					$strSQL = $strSQL."Name, ";
					$strSQL = $strSQL."Artist, ";
					$strSQL = $strSQL."Year, ";
					$strSQL = $strSQL."Genre) ";
					
					$strSQL = $strSQL."VALUES (";
					$strSQL = $strSQL."'".$album_name_add."'".", ";
					$strSQL = $strSQL."'".$album_artist_add."'".", ";
					$strSQL = $strSQL.$album_year_add.", ";
					$strSQL = $strSQL."'".$album_genre_add."'".") ";

					if ($mysqli->query($strSQL)) {
						echo "Новый альбом успешно добавлен."."\n";
					}
					else {
						echo "При добавлении нового альбома произошла ошибка.";
					}
					echo '<meta http-equiv = "refresh" content = "3; url = index.php">';
				}
				
				
				
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$button_search_album = $_POST['button_search_album'];
				
				if ($button_search_album == "Поиск альбома") {
					$album_id_search = $_POST['album_id_search'];
					$album_name_search = $_POST['album_name_search'];
					$album_artist_search = $_POST['album_artist_search'];
					$album_year_search = $_POST['album_year_search'];
					$album_genre_search = $_POST['album_genre_search'];
				
					$selection_request1 = "SELECT * FROM Albums";
					if ($album_id_search = "") {
						$selection_request1 = "SELECT * FROM Albums";
					}
					else {
						$selection_request1 = "SELECT * FROM Albums WHERE id = ".$album_id_search.";";
					}
					
					$selection_request2 = "SELECT * FROM Albums";
					if ($album_name_search = "") {
						$selection_request2 = "SELECT * FROM Albums";
					}
					else {
						$selection_request2 = "SELECT * FROM Albums WHERE name = ".$album_name_search.";";
					}
					
					$selection_request3 = "SELECT * FROM Albums";
					if ($album_artist_search = "") {
						$selection_request3 = "SELECT * FROM Albums";
					}
					else {
						$selection_request3 = "SELECT * FROM Albums WHERE Artist = ".$album_artist_add_search.";";
					}
					
					$selection_request4 = "SELECT * FROM Albums";
					if ($album_year_search = "") {
						$selection_request4 = "SELECT * FROM Albums";
					}
					else {
						$selection_request4 = "SELECT * FROM Albums WHERE Year = ".$album_year_search.";";
					}
					
					$selection_request5 = "SELECT * FROM Albums";
					if ($album_genre_search = "") {
						$selection_request5 = "SELECT * FROM Albums";
					}
					else {
						$selection_request5 = "SELECT * FROM Albums WHERE Genre = ".$album_genre_search.";";
					}
				
					$selection_request = "SELECT * FROM ".$selection_request1." INTERSECT SELECT * FROM ".$selection_request2.";"
					$result_of_request = $mysqli->query($selection_request);

					if ($mysqli->query($strSQL)) {
						echo "Новый альбом успешно добавлен."."\n";
					}
					else {
						echo "При добавлении нового альбома произошла ошибка.";
					}
					echo '<meta http-equiv = "refresh" content = "3; url = index.php">';
				}
			}
				
				
				
				if($_SERVER['REQUEST_METHOD'] == 'POST') {
					$button_add_album = $_POST['button_add_song'];
					
					if ($button_add_album == "Добавить композицию") {
						$song_name_add = $_POST['song_name_add'];
						$song_artist_add = $_POST['song_artist_add'];
						$song_album_add = $_POST['song_album_add'];
						$song_duration_add = $_POST['song_duration_add'];
									
						$strSQL = "INSERT INTO songs(";

						$strSQL = $strSQL."Name, ";
						$strSQL = $strSQL."Artist, ";
						$strSQL = $strSQL."Album, ";
						$strSQL = $strSQL."Duration) ";
						
						$strSQL = $strSQL."VALUES (";
						$strSQL = $strSQL."'".$song_name_add."'".", ";
						$strSQL = $strSQL."'".$song_artist_add."'".", ";
						$strSQL = $strSQL."'".$song_album_add."'".", ";
						$strSQL = $strSQL."'".$song_duration_add."'".")";

						if ($mysqli->query($strSQL)) {
							echo "Новая композиция успешно добавлена."."\n";
						}
						else {
							echo "При добавлении новой композиции произошла ошибка.";
						}
						echo '<meta http-equiv = "refresh" content = "3; url = index.php">';
					}
				}
			}
			
			
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$button_delete_song = $_POST['button_delete_song'];
				
				if ($button_delete_song == "Удалить композицию") {
					$value = $_POST['song_list'];
						
					$strSQL = "DELETE FROM Songs WHERE id = ".$value;

					if ($mysqli->query($strSQL)) {
						echo "Выбранная композиция успешно удалена."."\n";
					}
					else {
						echo "При удалении композиции произошла ошибка.";
					}
					echo '<meta http-equiv = "refresh" content = "3; url = index.php">';
				}
			}
			
			
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$button_delete_song = $_POST['button_delete_album'];
				
				if ($button_delete_song == "Удалить альбом") {
					$value = $_POST['album_list'];
						
					$strSQL = "DELETE FROM Albums WHERE id = ".$value;

					if ($mysqli->query($strSQL)) {
						echo "Выбранный альбом успешно удален."."\n";
					}
					else {
						echo "При удалении альбома произошла ошибка.";
					}
					echo '<meta http-equiv = "refresh" content = "3; url = index.php">';
				}
			}
			
			
			/* Закрываем соединение */
			$mysqli->close();
		?> 
	</body>
</html>