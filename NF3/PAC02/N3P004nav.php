<?php
$db = mysqli_connect('localhost', 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));
$noRegistros = 4; //Registros por página
$pagina = 1; //Por defecto pagina = 1
if(isset($_GET['pagina']))
    $pagina = $_GET["pagina"]; //Si hay pagina, lo asigna
$buskr=$_GET['searchs'] ?? '';

//Utilizo el comando LIMIT para seleccionar un rango de registros
$sSQL = 
    "SELECT *
    FROM 
        movie,people
    WHERE 
        people_id = movie_leadactor
	LIKE
	'%$buskr%'
    LIMIT 
        ".($pagina-1)*$noRegistros.",$noRegistros";

$result = mysqli_query($db,$sSQL) or die(mysqli_error($db));

//Exploracion de registros
echo "<table>";
	while($row = mysqli_fetch_array($result)) { 
		echo "<tr><td height=75 align=center>$row[movie_id]</td>";
		echo "<td align=center><img src='fotos/
		$row[movie_id]' width=70 height=70></td>";
		echo "<td>$row[movie_name]</td>";
		echo "<td align=center>$row[movie_year]</td>";
		echo "<br></tr>";
	}
//Imprimiendo paginacion
$sSQL =
		"SELECT 
			count(*) 
		FROM 
			movie 
		WHERE 
			movie_name
		LIKE 
			'%$buskr%'";
 //Cuento el total de registros
$result = mysqli_query($db,$sSQL);
$row = mysqli_fetch_array($result);
$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable
$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de paginas


echo "<tr>";
echo "<td colspan='2' align='center'><strong>Total registros: </strong>$totalRegistros </td>";
echo "<td colspan='2' align='center'><strong>Pagina: </strong>$pagina</td>";
echo "</tr>";
echo "<tr bgcolor='f3f4f1'>";
echo "<td colspan='4' align='right'><strong>Pagina:";

for($i=1; $i<$noPaginas+1; $i++) { //Imprimo las paginas
	if($i == $pagina)
		echo "<font color=red> $i </font>"; //A la pagina actual no le pongo link
	else
		echo "<a href=\"?pagina=".$i."&searchs=".$buskr."\" style=color:#000;> ".$i."</a>";
}
echo	"</strong></td>";
echo 	"</tr>";
echo 	"</table>";
?>