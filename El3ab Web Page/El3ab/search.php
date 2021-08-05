<?php
    session_start();
?>

<?php
            if($_SERVER['REQUEST_METHOD'] == "GET")
	        {
                $_gamename = $_GET["gameName"];
                if ($_gamename == ""){
                    header("Location: http://localhost/El3ab/browse.php");
                    return;
                }

                require_once ("class.connect.php");

                $con = new mySQL();
                $con->connect();
                $stmt = $con->query("SELECT * FROM games WHERE Quantity > 0 and ( GameName = '".$_gamename."' or Category = '".$_gamename."') ");
            }
?>
<html>

<head>
    <title>El3ab</title>
    <link rel="stylesheet" href="insertGameCSS.css">
    <script src="myScript1.js"></script>

  
</head>

<body style="background-image: url(bk.png)">
    <div class="wrapper">
        <?php
            require_once ("class.layout.php");
            $var = new myMenu();
            $var->printMenu();
        ?>
        <table class='games'>
            <?php
                require_once ("class.connect.php");
                 while ( $game= $con->fetch($stmt)){
                     echo("<form action = 'searchAction.php' method= 'POST'> ");
                     echo("<tr class='gameRow'>");
                     echo("<input hidden type = 'text' name ='gameID' value = '".$game[1]."'>");
                     echo("<input hidden type = 'text' name ='quantity' value = '".$game[5]."'>");
                        echo("<td class='gameIcon'><img src=".$game[6]." class='picture'></td>");
                        echo("<td class='gameName'><h3>".$game[2]."</h3></td>");
                        echo("<td class='discription'><h3>".$game[4]."</h3></td>");

                        echo("<td class='category'><h3>".$game[3]."</h3></td>");
                        echo("<td class='price'><h3> $ ".$game[7]."</h3></td>");
                        echo("<td class='gameBuy'><input type='submit' value = 'Buy' class='buyButton'></td>");
                     echo("</tr>");
                     echo ("</form>");
                 }
                 $con->close();
            ?>
        </table>

    </div>


</body>

</html>