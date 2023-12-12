<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

// Primera Query Actores
$query = 
    'SELECT
        movie_id, movie_name, movie_leadactor, people_fullname, people_id
    FROM
        people, movie
    WHERE
        people_id = movie_leadactor
    ORDER BY
        movie_id';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// show the results
echo '<table border="1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';

// Segunda Query Director
$query = 
    'SELECT
        movie_id, movie_name, movie_leadactor, people_fullname, people_id
    FROM
        people, movie
    WHERE
        people_id = movie_director
    ORDER BY
        movie_id';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// show the results
echo '<br>';
echo '<table border="1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>