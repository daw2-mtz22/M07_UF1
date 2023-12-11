<?php
	session_start();
	isset($_SESSION['cont']) ? $_SESSION['cont'] += 1 : $_SESSION['cont'] = 1;

	echo "Ha visitado esta página ".  $_SESSION['cont'] . " vez/ces" ;
	$color = $_COOKIE['cookiecolor'] ?? "";
	$font = $_COOKIE['cookiefont'] ?? "";
	$size = $_COOKIE['cookiesize'] ?? "";

?>
<html>

	<head>
	<title> Welcome!</title>
	 <style>
		p{
			text-align: "left";
		}
		<?php

			echo '.ejercicio4 {';
				echo ' color: ', $_GET['color'] ?? 'red', ';';
				echo ' font-family: ',$_GET['font'] ?? 'Times New Roman', ';';
				echo ' font-size: ', $_GET['size'] ?? '30', ';';
			echo '}';
		 ?>
	 </style>
	</head>
		<body>
			<div>

			</div>

			<div style="text-align: center;">
				<p> Welcome to my Site<br/>

				<?php
				//EJERCICIO 1
				date_default_timezone_set("Europe/Athens");
				echo "Yesterday it Was ";
				echo date("F j",  strtotime("-1 days"));
				echo ", ";
				echo date("Y");
				echo "</br>The previous month is ";
				echo date("F",strtotime("-1 Month"));
				echo "</br>There are ";
				$restantes= (int)date('t')-(int)date('j');
				echo $restantes;
				echo " Days left in this month";
				echo "</br>There are ";
				$Restantes=12-(int)date('n');
				echo $Restantes;
				echo " Month's left in this current year";
				echo "<br>";
				?>
				</div>
				<div>
				<hr>
				<?php
				//EJERCICIO 3
				if ((date ('j')>=20 && date('n')>=3)&& ((date ('j')<=20 && date('n')<=6))){
					echo "<p>Buena Primavera</p>";
				}
				elseif ((date ('j')>=21 && date('n')>=6)&& ((date ('j')<=22 && date('n')<=9))){
					echo "<p>Buen Verano</p>";
				}
				elseif ((date ('j')>=12 && date('n')>=9)&& ((date ('j')<=21 && date('n')<=12))){
					echo "<p>Buen Otoño</p>";
				}			
				else{
					echo "<p>Buen Invierno</p>";
				}
				//EJERCICIO 4


				echo	'<hr>';
				
				echo	'<form action="/N3Date_AaronMartinez.php" method="get">';
				echo	'<p> Color : ';
				echo		'<input type="color" name="color" value='.$color.'>';
				echo	'<br>';
				echo	'</p>';
				echo	'<p> Tipo fuente: ';
				echo		'<input type="text" name="font" value='.$font.'>';
				echo	'</p>';
				echo	'<p> Tamaño fuente: ';
				echo		'<input type="text" name="size" value='.$size.'>';
				echo	'</p>';
				echo	'<p> ¿Guardar información? ';
				echo		'<input type="checkbox" name="save">';
				echo	'</p>';
				echo	'<p>';
				echo		'<input type="submit" name="Submit">';
				echo	'</p>';
				echo	'</form>';
				
				$save=$_GET['save'] ?? 'null';
					
					if($save=='on'){

						setcookie(
							'cookiecolor',
							$cookiecolor = $_COOKIE['cookiecolor'] ?? $_GET['color'] ?? NULL,
							time()+69
						);
						setcookie(
							'cookiefont',
							$cookiefont =$_COOKIE['cookiefont'] ?? urldecode($_GET['font']) ?? NULL,
							time()+60
						);
						setcookie(
							'cookiesize',
							$cookiesize = $_COOKIE['cookiesize'] ?? $_GET['size'] ?? NULL,
							time()+60
						);
					}
					// forzamos el final de la sesion
				?>

				<p class='ejercicio4'> Este texto es de prueba para el ejercicio 4, tendremos que darle un formato con varios inputs </p>
			</div>
			<hr>
			<?php
			include 'footer.php';
			?>
		</body>
</html>
