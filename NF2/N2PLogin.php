<?php
session_unset();
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
<form method="post" action="N2PMain.php">
    <p> Nombre de Usuario:
        <input type="text" name="user"/>
    </p>
    <p>Contraseña:
        <input type="password" name="pass"/>
    </p>
    <p>
        <input type="submit" name="submit" value="Submit"/>
    </p>
</form>
</body>
</html>