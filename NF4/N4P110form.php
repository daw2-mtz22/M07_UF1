<?php 
echo <<<ENDHTML
<html>
    <head>
    </head>
    <body>
        <form action="N4P111formprocess.php?movie_id=$_GET[movie_id]" method="post">
            <table>
                <tr>
                    <td>Reviewer</td>
                    <td>
                        <input type="text" name="reviewer" value="">
                    </td>
                </tr>
                <tr>
                    <td>Rating</td>
                    <td>
                        <input type="number" step="0.5"  min="0 "max="5" name="rating" value="">
                    </td>
                </tr>
                <tr>
                    <td>Comment</td>
                    <td>
                        <textarea name="comment" rows="10" cols="50">Escribe algo ...</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Enviar comentario">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
ENDHTML;
?>