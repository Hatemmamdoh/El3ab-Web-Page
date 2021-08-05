<?php
    session_start();
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

                 $con = new mySQL();
                 $con->connect(); 
                 if ( isset( $_SESSION['user_id'] ) ) {
                    $stmt = $con->query("SELECT * FROM games where UserID != ".$_SESSION['user_id']." and Quantity > 0");
                } else {
                    $stmt = $con->query("SELECT * FROM games");
                }
                 while ( $game= $con->fetch($stmt)){
                     echo("<form action = '' method= 'POST'> ");
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


    <?php
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if ( isset( $_SESSION['user_id'] ) ) {
        }
        else{
            header("Location: http://localhost/El3ab/login.php");
            return;

        }
        require_once ("class.connect.php");
        $con = new mySQL();
        $con->connect();
        $_gameID    = $_POST["gameID"];
        $_quantity  = $_POST["quantity"] - 1;
        $stmt = $con->query("INSERT INTO mygames (UserID, GameID) VALUES (".$_SESSION['user_id']." , ".$_gameID." )");
        $stmt = $con->query("UPDATE `games` SET `Quantity`=" .$_quantity. " WHERE GameID = ".$_gameID);
        $con->close();
        header("Location: http://localhost/El3ab/purchases.php");
    }
    ?>
</body>

</html>