<?php
    $reviewer =$_POST['reviewer'];
    $rating =$_POST['rating'];
    $comment =$_POST['comment'];
    
    //date("Y-m-d H:i:s") el formato DATETIME de SQL
    $fecha_actual = date("Y-m-d");
    $movie_id = $_GET['movie_id'];

    //Nos contectamos a la BBDD
    $db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

    //Seleccionamos base de datos 
    mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

    //Insertamos datos que vienen de N4110form.php
    $query = <<<ENDSQL
        INSERT INTO reviews
            (review_movie_id, reviewer_name, review_comment,
            review_rating, review_date)
        VALUES
            ("$movie_id","$reviewer","$comment","$rating","$fecha_actual")
        ENDSQL;
    
    //Ejecutamos la query
    mysqli_query($db,$query) or die(mysqli_error($db));

    echo <<<ENDHTML
    <html>
    <head></head>
    <body>
        <form action="N4P000details.php?movie_id=$_GET[movie_id]" method="POST">
            <table>
                <tr>
                    Comentario Anyadido correctamente!
                </tr>
                <tr>
                    <input type="submit" value="Volver">
                </tr>
            </table>
    </body>
    </html>
ENDHTML;
?>  