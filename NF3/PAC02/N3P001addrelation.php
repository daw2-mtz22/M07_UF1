<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root', 'root') or die 
('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database 
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$query = 'alter table movie add constraint peopleidmovieleadactor 
foreign key (movie_leadactor) references people(people_id)';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'Relation completed succesfully!'
?>