<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

//alter the movie table to include release and rating
$query = 'ALTER TABLE people ADD COLUMN (
    people_email nvarchar(255) NOT NULL DEFAULT "")';
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Movie database successfully updated!';
?>
