<html>
<head>
<title>
</title>
</head>
<body background = "background.jpg">
	<H1 align = center style = "color:white;"> Player 1 </H1>
	<p align = center>
		<img src="/images/fon.jpg" class="promo-img" id="image_id11"/>
	    <img src="/images/fon.jpg" class="promo-img" id="image_id12"/> 
	</p>
	<H1 align = center style = "color:white;"> Player 2 </H1>
	<p align = center>
		<img src="/images/fon.jpg" class="promo-img" id="image_id21"/>
	    <img src="/images/fon.jpg" class="promo-img" id="image_id22"/> 
	</p>
	
	<script>
		function randomInteger(min, max) {
		  var rand = min + Math.random() * (max - min);
		  rand = Math.round(rand);
		  return rand;
		}

		var images = ['/1.jpg', '/2.jpg', '/3.jpg', '/4.jpg', '/5.jpg', '/6.jpg'],
			length = images.length;

		var i = 1;
		timer1 = window.setInterval(function one() {
			var index1 = 0;
			var index2 = 0;
			
			index11 = randomInteger(0, 5);
			index12 = randomInteger(0, 5);
			
			index21 = randomInteger(0, 5);
			index22 = randomInteger(0, 5);
			
			i++;
			if (i > 30) {
				var sum1 = index11 + index12;
				var sum2 = index21 + index22;
				document.write("<body background = 'background.jpg' style = 'color:white;' align = center>")
				document.write("<H1> Player 1 Score:",sum1,"</H1>");
				document.write("<H1> Player 2 Score:",sum2,"</H1>");
				
				
				if (sum1 > sum2) {
					document.write("<H1>First player win!</H1>");
				}
				if (sum1 < sum2) {
					document.write("<H1>Second player win!</H1>");
				}
				if (sum1 == sum2) {
					document.write("<H1>Draw!</H1>");
				}
				clearInterval(window.timer1);
				
				;
			}
	
			document.getElementById('image_id11').src = images[index11];
			document.getElementById('image_id12').src = images[index12];
			
			document.getElementById('image_id21').src = images[index21];
			document.getElementById('image_id22').src = images[index22];
		}, 100);
		
	</script>
</body>