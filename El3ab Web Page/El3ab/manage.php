<?php
    session_start();
?>

<html>

    <head>
        <title>El3ab - Manage</title>
        <link rel="stylesheet" href="insertGameCSS.css">
    </head>

    <body style="background-image: url(bk.png)">
        <?php
            if ( isset( $_SESSION['user_id'] ) ) {
            } else {
                header("Location: /El3ab/browse.php");
            }
        ?>

        <div class="wrapper">
            <?php
                require_once ("class.layout.php");
                $var = new myMenu();
                $var->printMenuManage();
            ?>
            <table class='games'>
            <?php
                require_once ("class.connect.php");

                 $con = new mySQL();
                 $con->connect(); 
                 $stmt = $con->query("SELECT * FROM games Where UserID = ".$_SESSION['user_id']);
                 while ( $game= $con->fetch($stmt)){
                     echo("<form action='http://localhost/El3ab/update.php' method='POST'>");
                     echo("<tr class='gameRow'>");
                        echo("<input hidden type = 'text' name ='gameID' value = '".$game[1]."'>");
                        echo("<td class='gameIcon'><img src=".$game[6]." class='picture'></td>");
                        echo("<td class='gameName'><h3>".$game[2]."</h3></td>");
                        echo("<td class='discription'><h3>".$game[4]."</h3></td>");
                        echo("<td class='category'><h3>".$game[3]."</h3></td>");
                        echo("<td class='price'><h3> $ ".$game[7]."</h3></td>");
                        echo("<td class='update'><input type='submit' value='update'/></td>");        
                        echo("</form>");
                        echo("<form action='http://localhost/El3ab/deleteG.php' method='POST'>");
                        echo("<input hidden type = 'text' name ='gameID' value = '".$game[1]."'>");
                        echo("<td class='delete'><button>Delete</button></td>");
                     echo("</tr>");
                     echo("</form>");
                 }
                 $con->close();
            ?>
            </table>
        </div>
</body>

</html>