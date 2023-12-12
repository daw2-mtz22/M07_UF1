<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <?php print_r($_POST);
            function operar($op1, $i, $op2){
                $res=0;
                if($i=='+'){
                    $res=$op1+$op2;
                }
                elseif($i=='-'){
                    $res=$op1-$op2;
                }
                elseif($i=='*'){
                    $res=$op1*$op2;
                }
                else{
                    $res=$op1/$op2;
                }
                return $res;
            }
            $res= $_POST['num1']+$_POST['num2']+$_POST['num3'];
            $res2=operar($_POST['num1'],$_POST['op1'],$_POST['num2']);
            $res2=operar($res2,$_POST['op2'],$_POST['num3']);
        ?>
		<h1> </h1>
        <table>
        <tr>
				<td colspan="7">
				<?php
				echo '<br>Sumatorio Normal: '.$res;
				?>
				</td>
            </tr>
			<tr></tr>
			<tr>
			<td colspan="7">
				<Strong>Calculadora</Strong>
			</td>
			</tr>
            <tr>
                <td><?php echo $_POST['num1'];?></td>
                <td><?php echo $_POST['op1'];?></td>
                <td><?php echo $_POST['num2'];?></td>
                <td><?php echo $_POST['op2'];?></td>
                <td><?php echo $_POST['num3'];?></td>
                <td><?php echo '= '.$res2?></td>
            </tr>
        </table>
    </body>
</html>