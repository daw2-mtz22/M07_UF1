<?php
echo <<<ENDHTML
	<html>
	    <head>
	        <title>
	
	        </title>
	    </head>
	    <body>
	        <table>
	            <form action="N4P115formprocess.php" method="post">
	            <tr>
	                <td><input type="number" name="num1"></td>
	            </tr>
	            <tr>
	                <td>
	                    <select name="op1">
	                        <option value="+">+</option>;
	                        <option value="-">-</option>;
	                        <option value="*">*</option>;
	                        <option value="/">/</option>;
	                    </select>
	                </td>
	            </tr>
	            <tr>
	                <td><input type="number" name="num2" ></td>
	            </tr>
	            <tr>
	                <td>
	                    <select name="op2">
	                        <option value="+">+</option>;
	                        <option value="-">-</option>;
	                        <option value="*">*</option>;
	                        <option value="/">/</option>;
	                    </select>
	                </td>
	            </tr>
	            <tr>
	                <td><input type="number" name="num3" ></td>
	            </tr>
	            <tr>
	                <td><input type="Submit" name="Calcular" value="Submit"></td>
	            </tr>
	            </form>
	        </table>
	    </body>
	</html>
ENDHTML;
?>