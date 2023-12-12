<html>
    <head>
        <title>
        </title>
    </head>
    <body>
        <form action="" method="post">
            <table>
                <select name="sel">
                    <option value="<?php $_POST['sel1'];?>"><?php echo $_POST['sel1'];?></option>;
                    <option value="<?php $_POST['sel2'];?>"><?php echo $_POST['sel2'];?></option>;
                    <option value="<?php $_POST['sel3'];?>"><?php echo $_POST['sel3'];?></option>;
                    <option value="<?php $_POST['sel4'];?>"><?php echo $_POST['sel4'];?></option>;
                    <option value="<?php $_POST['sel5'];?>"><?php echo $_POST['sel5'];?></option>;
                </select>
            </table>
        </form>
		<?php print_r($_POST); ?>
    </body>
</html>
