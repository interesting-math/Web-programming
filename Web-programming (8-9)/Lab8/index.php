<html>
<head>
<title>
</title>
</head>
<body>
	<p align = center> Player 1 </p>
	<p align = center>
		<img src="/images/fon.jpg" class="promo-img" id="image_id11"/>
	    <img src="/images/fon.jpg" class="promo-img" id="image_id12"/> 
	</p>
	<p align = center> Player 2 </p>
	<p align = center>
		<img src="/images/fon.jpg" class="promo-img" id="image_id21"/>
	    <img src="/images/fon.jpg" class="promo-img" id="image_id22"/> 
	</p>
	
	<div id = "first_player_win_text"  style="display:none;"> First player win! </div>
	<div id = "second_player_win_text" style="display:none;"> Second player win! </div>
	<div id = "draw_text" style="display:none;"> Draw! </div>

	<script>
		function randomInteger(min, max) {
		  var rand = min + Math.random() * (max - min);
		  rand = Math.round(rand);
		  return rand;
		}

		var images = ['/1.jpg', '/2.jpg', '/3.jpg', '/4.jpg', '/5.jpg', '/6.jpg'],
			length = images.length;

		var i = 1;
		timer1 = window.setInterval(function() {
		//	var index1 = 0;
		//	var index2 = 0;
			setTimeout(1000);
			index11 = randomInteger(0, 5);
			index12 = randomInteger(0, 5);
			
			index21 = randomInteger(0, 5);
			index22 = randomInteger(0, 5);
			
			i++;
			if (i > 40) {
				document.write(index1);
				document.write(index2);
				
				clearInterval(window.timer1);
			}
	
			document.getElementById('image_id11').src = images[index11];
			document.getElementById('image_id12').src = images[index12];
			
			document.getElementById('image_id21').src = images[index21];
			document.getElementById('image_id22').src = images[index22];
		}, 100);
	</script>
</body>