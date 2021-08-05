<?php
    session_start();
?>

<?php
    if ( isset( $_SESSION['user_id'] ) ) {
        
        require_once ("class.connect.php");
        $con = new mySQL();
        $con->connect();
        $_gameID    = $_POST["gameID"];
        $_quantity  = $_POST["quantity"] - 1;
        $stmt = $con->query("INSERT INTO mygames (UserID, GameID) VALUES (".$_SESSION['user_id']." , ".$_gameID." )");
        $stmt = $con->query("UPDATE `games` SET `Quantity`=" .$_quantity. " WHERE GameID = ".$_gameID);
        $con->close();
        
        header("Location: http://localhost/El3ab/purchases.php");
        
    } else {
        header("Location: http://localhost/El3ab/login.php");
        return;
    }
?>
