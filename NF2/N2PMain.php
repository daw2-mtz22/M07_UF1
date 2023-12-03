<?php
session_start();
$_SESSION['user'] = $_POST['user'] ?? 'null';
$_SESSION['userpass'] = $_POST['pass'] ??	'null';
$_SESSION['authuser'] = 0;
$_COOKIE['usercookie'] = $_COOKIE['usercookie'] ?? '';

if ((($_SESSION['user'] == "Aaron") && ($_SESSION['userpass'] == 1234)) || ($_COOKIE['usercookie']==1)){
    $_SESSION['authuser'] = 1;

}

if (($_SESSION['authuser'] != 1) && ($_COOKIE['usercookie']!=1)){
    echo 'Lo siento pero no tienes permisos para esta pagina, debes <a href="N2PLogin.php"> "Logearte"</a>';
    exit();
}
setcookie("usercookie",1,time()+100);
?>
<html>
<head>
    <title>Main</title>
</head>
<body>
<?php
$_COOKIE['usercolor'] = $_COOKIE['usercolor'] ?? '';
$color= $_GET["color"] ?? '';
if($color == ''):
    ?>
    <form method="post"
    <p> Color favorito:
        <input type="text" name="color"/>
    </p>
    </form>
    <?php
    $color =$_POST['color']  ?? '';
else:
    $_COOKIE['usercolor'] = $color;
endif;

setcookie("usercolor",$color,time()+15);
if( $_COOKIE['usercolor'] || $color):
    echo "Mi color favorito y el de la cookie :D : ". htmlspecialchars($_COOKIE["usercolor"]); //Espera 15 segundos y desparecerá ( Timeout de la cookie y actualiza)
    echo '<br>';
    echo 'Mi color favorito es: ', $color;
    echo '<br>';
endif;
?>
</body>