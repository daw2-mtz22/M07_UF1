<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root', 'root') or die 
('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database 
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));


$query = 'INSERT INTO movie
        (movie_id, movie_name, movie_type, movie_year, movie_leadactor,
        movie_director)
    VALUES
        (4, "El Padrino", 2, 1972, 1, 2),
        (5, "La Lista de Schindler", 4, 1993, 5, 11),
        (6, "El Lobo de Wall Street", 2, 2019, 9, 12)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the movietype table
$query = 'INSERT INTO movietype 
        (movietype_id, movietype_label)
    VALUES 
        (9,"Cartoon"),
        (10, "Musical"), 
        (11, "Western")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO people
        (people_id, people_fullname, people_isactor, people_isdirector)
    VALUES
        (7, "Jhonny Deep", 1, 0),
        (8, "Morgan Freeman", 1, 0),
        (9, "Leonardo DiCaprio", 1, 0),
        (10, "Quentin Tarantino", 0, 1),
        (11, "Steven Spielberg", 0, 1),
        (12, "Martin Scorsese", 0, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Data inserted Succesfully!'
?>