<?php
    $db = mysqli_connect('localhost', 'root', 'root') or 
        die ('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db,'moviesite') or die(mysqli_error($db));


	//Heredoc para insertar datos en bbdd
    $query = <<<ENDSQL
        INSERT INTO reviews
            (review_movie_id, review_date, reviewer_name, review_comment,
                review_rating)
        VALUES 
            (4, "2008-09-23", "Billy Bob", "I liked Eraserhead better.", 3),

            (4, "2008-09-23", "John Doe", "I thought this was a great movie
                Even though my girlfriend made me see it against my will.", 4), 

            (4, "2008-09-28", "Peppermint Patty", "I wish I'd have seen it
                sooner!", 5),

            (5, "2008-09-23", "Marvin Martian", "This is my favorite movie. I
                didn't wear my flair to the movie but I loved it anyway.", 5),

            (5, "2008-09-23", "George B.", "I liked this movie, even though I
                Thought it was an informational video from my travel agent.", 2),

            (5, "2008-09-23", "Marvin Martian", "This is my favorite movie. I
                didn't wear my flair to the movie but I loved it anyway.", 1),

            (6, "2008-09-23", "George B.", "I liked this movie, even though I
                Thought it was an informational video from my travel agent.", 3),

            (6, "2008-09-23", "Marvin Martian", "This is my favorite movie. I
                didn't wear my flair to the movie but I loved it anyway.", 5),
                
            (6, "2008-09-28", "Peppermint Patty", "I wish I'd have seen it
                sooner!", 5)
ENDSQL;
    echo $query;
    //Ejecutamos la query
    mysqli_query($db,$query) or die(mysqli_error($db));


    echo '<br> Datos insertados correctamente!';
?>