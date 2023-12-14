<?php
    $db = mysqli_connect('localhost', 'root', 'root') or
        die ('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
 <?php
     switch ($_GET['action']) {
         case 'add':
             switch ($_GET['type']) {
                 case 'movie':
                     $error = array();
                     $movie_name = isset($_POST['movie_name']) ?
                         trim($_POST['movie_name']) : '';
                     if (empty($movie_name)) {
                         $error[] = urlencode('Please enter a movie name.');
                     }
                     $movie_type = isset($_POST['movie_type']) ?
                         trim($_POST['movie_type']) : '';
                     if (empty($movie_type)) {
                         $error[] = urlencode('Please select a movie type.');
                     }
                     $movie_year = isset($_POST['movie_year']) ?
                         trim($_POST['movie_year']) : '';
                     if (empty($movie_year)) {
                         $error[] = urlencode('Please select a movie year.');
                     }
                     $movie_leadactor = isset($_POST['movie_leadactor']) ?
                         trim($_POST['movie_leadactor']) : '';
                     if (empty($movie_leadactor)) {
                         $error[] = urlencode('Please select a lead actor.');
                     }
                     $movie_director = isset($_POST['movie_director']) ?
                         trim($_POST['movie_director']) : '';
                     if (empty($movie_director)) {
                         $error[] = urlencode('Please select a director.');
                     }
                     $movie_release = isset($_POST['movie_release']) ?
                         trim($_POST['movie_release']) : '';
                     if (!preg_match('|^\d{2}-\d{2}-\d{4}$|', $movie_release)) {
                         $error[] = urlencode('Please enter a date in dd-mm-yyyy format.');
                     } else {
                         list($day, $month, $year) = explode('-', $movie_release);
                         if (!checkdate($month, $day, $year)) {
                             $error[] = urlencode('Please enter a valid date.');
                         } else {
                             $movie_release = mktime(0, 0, 0, $month, $day, $year);
                         }
                     }
                     $movie_rating = isset($_POST['movie_rating']) ?
                         trim($_POST['movie_rating']) : '';
                     if (!is_numeric($movie_rating)) {
                         $error[] = urlencode('Please enter a numeric rating.');
                     } else if ($movie_rating < 0 || $movie_rating > 10) {
                         $error[] = urlencode('Please enter a rating between 0 and 10.');
                     }
                     if (empty($error)) {
                         $query = 'INSERT INTO
                                movie
                                    (movie_name, movie_year, movie_type, movie_leadactor,
                                    movie_director, movie_release, movie_rating)
                                VALUES
                                    ("' . $movie_name . '",
                                     ' . $movie_year . ',
                                     ' . $movie_type . ',
                                     ' . $movie_leadactor . ',
                                     ' . $movie_director . ',
                                     ' . $movie_release . ',
                                     ' . $movie_rating . ')';
                     } else {
                         header('Location:N6Pmovie.php?action=add' .
                             '&error=' . join(urlencode('<br/>'), $error));
                     }
                     break;
                 case 'people':
                     $error = array();
                     $people_fullname = isset($_POST['people_fullname']) ?
                         trim($_POST['people_fullname']) : '';
                     if (empty($people_fullname)) {
                         $error[] = urlencode('Please enter an actor name.');
                     }
                     if(ctype_lower($people_fullname)){
                         $error[] = urlencode('Please Name needs to have at least one uppercase character');
                     }
                     $people_email = isset($_POST['people_email']) ?
                         trim($_POST['people_email']) : '';
                     if (empty($_POST['people_email'])) {
                         $error[] = urlencode('Email is required');
                     } else {
                         if (!filter_var($people_email, FILTER_VALIDATE_EMAIL)) {
                             $error[] = urlencode('Invalid email format');
                         }
                     }
                     transform();
                     $people_isactor = $_POST['people_isactor'] ?? 0;
                     $people_isdirector = $_POST['people_isdirector'] ?? 0;
                     if ($people_isactor ===0 && $people_isdirector ===0){
                             $error[] = urlencode('You have to select at least one people type');
                         }
                     if(empty($error)){
                        $query = 'INSERT INTO
                        people
                            (people_fullname,people_email,people_isactor,people_isdirector)
                        VALUES
                            ("' .$_POST['people_fullname'] . '",
                                "' . $_POST['people_email'] . '",
                             ' . $_POST['people_isactor'] . ',
                             ' . $_POST['people_isdirector'] . ')';
                     } else {
                         header('Location:N6Ppeople.php?action=add' .
                             '&error=' . join(urlencode('<br/>'), $error));
                     }
                     break;
             }
             break;
         case 'edit':
             switch ($_GET['type']) {
                 case 'movie':
                     $error = array();
                     $movie_name = isset($_POST['movie_name']) ?
                         trim($_POST['movie_name']) : '';
                     if (empty($movie_name)) {
                         $error[] = urlencode('Please enter a movie name.');
                     }
                     $movie_type = isset($_POST['movie_type']) ?
                         trim($_POST['movie_type']) : '';
                     if (empty($movie_type)) {
                         $error[] = urlencode('Please select a movie type.');
                     }
                     $movie_year = isset($_POST['movie_year']) ?
                         trim($_POST['movie_year']) : '';
                     if (empty($movie_year)) {
                         $error[] = urlencode('Please select a movie year.');
                     }
                     $movie_leadactor = isset($_POST['movie_leadactor']) ?
                         trim($_POST['movie_leadactor']) : '';
                     if (empty($movie_leadactor)) {
                         $error[] = urlencode('Please select a lead actor.');
                     }
                     $movie_director = isset($_POST['movie_director']) ?
                         trim($_POST['movie_director']) : '';
                     if (empty($movie_director)) {
                         $error[] = urlencode('Please select a director.');
                     }
                     $movie_release = isset($_POST['movie_release']) ?
                         trim($_POST['movie_release']) : '';
                     if (!preg_match('|^\d{2}-\d{2}-\d{4}$|', $movie_release)) {
                         $error[] = urlencode('Please enter a date in dd-mm-yyyy format.');
                     } else {
                         list($day, $month, $year) = explode('-', $movie_release);
                         if (!checkdate($month, $day, $year)) {
                             $error[] = urlencode('Please enter a valid date.');
                         } else {
                             $movie_release = mktime(0, 0, 0, $month, $day, $year);
                         }
                     }
                     $movie_rating = isset($_POST['movie_rating']) ?
                         trim($_POST['movie_rating']) : '';
                     if (!is_numeric($movie_rating)) {
                         $error[] = urlencode('Please enter a numeric rating.');
                     } else if ($movie_rating < 0 || $movie_rating > 10) {
                         $error[] = urlencode('Please enter a rating between 0 and 10.');
                     }
                     if (empty($error)) {
                         $query = 'UPDATE
                                    movie
                                SET 
                                    movie_name = "' . $movie_name . '",
                                    movie_year = ' . $movie_year . ',
                                    movie_type = ' . $movie_type . ',
                                    movie_leadactor = ' . $movie_leadactor . ',
                                    movie_director = ' . $movie_director . ',
                                    movie_release = ' . $movie_release . ',
                                    movie_rating = ' . $movie_rating . '
                                WHERE
                                    movie_id = ' . $_POST['movie_id'];
                     } else {
                         header('Location:N6Pmovie.php?action=edit&id=' . $_POST['movie_id'] .
                             '&error=' . join(urlencode('<br/>'), $error));

                     }
                     break;
                 case 'people':
                     $error = array();
                     $people_fullname = isset($_POST['people_fullname']) ?
                         trim($_POST['people_fullname']) : '';
                     if (empty($people_fullname)) {
                         $error[] = urlencode('Please enter an actor name.');
                     }
                     if(ctype_lower($people_fullname)){
                         $error[] = urlencode('Please Name needs to have at least one uppercase character');
                     }
                     $people_email = isset($_POST['people_email']) ?
                         trim($_POST['people_email']) : '';
                     if (empty($_POST['people_email'])) {
                         $error[] = urlencode('Email is required');
                     } else {
                         if (!filter_var($people_email, FILTER_VALIDATE_EMAIL)) {
                             $error[] = urlencode('Invalid email format');
                         }
                     }
                     transform();
                     $people_isactor = $_POST['people_isactor'] ?? 0;
                     $people_isdirector = $_POST['people_isdirector'] ?? 0;

                     if ($people_isactor ===0 && $people_isdirector ===0){
                             $error[] = urlencode('You have to select at least one people type');
                         }
                     if(empty($error)){
                         $query = 'UPDATE people SET
                        people_fullname = "' . $_POST['people_fullname'] . '",
                        people_email = "' . $_POST['people_email'] . '",
                        people_isactor = ' . $_POST['people_isactor'] . ',
                        people_isdirector = ' . $_POST['people_isdirector'] . '
                    WHERE
                        people_id ='  . $_POST['people_id'];
                     } else{
                     header('Location:N6Ppeople.php?action=edit&id=' . $_POST['people_id'] .
                         '&error=' . join(urlencode('<br/>'), $error));
                 }
                 break;
             }
             break;
     }
     if (isset($query)) {
         $result = mysqli_query($db, $query) or die(mysqli_error($db));
     }
 function transform(){
     if ($_POST['people_type']=="actor" || $_POST['people_type2']=="actor"){
         $_POST['people_isactor'] = 1;
     }else{
         $_POST['people_isactor'] = 0;
     }

     if($_POST['people_type']=="director" || $_POST['people_type2']=="director"){
         $_POST['people_isdirector'] = 1;
     }
     else{
         $_POST['people_isdirector'] = 0;
     }
 }
 ?>
  <p>Done!</p>
 </body>
</html>