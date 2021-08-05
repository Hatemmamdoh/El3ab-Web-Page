<?php
    session_start();
?>

<html>
    <head>
        <title>El3ab - Manage</title>
        <link rel="stylesheet" href="insertGameCSS.css">
        <script src="myScript1.js"></script>

    </head>

<body style="background-image: url(bk.png)" >
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
                $var->printMenu();
            ?>
            <table class='games'>
            <?php
                require_once ("class.connect.php");

                 $con = new mySQL();
                 $con->connect(); 
                // Query not
                 $stmt = $con->query("SELECT DISTINCT * FROM mygames inner join games on games.GameID = mygames.GameID And mygames.UserID = ".$_SESSION['user_id']);
                 while ( $game= $con->fetch($stmt)){
                     echo("<tr class='gameRow'>");
                        echo("<td class='gameIcon'><img src=".$game[8]." class='picture'></td>");
                        echo("<td class='gameName'><h3>".$game[4]."</h3></td>");
                        echo("<td class='discription'><h3>".$game[6]."</h3></td>");
                        echo("<td class='category'><h3>".$game[5]."</h3></td>");
                     echo("</tr>");
                 }
                 $con->close();
            ?>
            </table>
        </div>

</body>

</html>