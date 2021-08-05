<?php
            if ( isset( $_SESSION['user_id'] ) ) {
            } else {
                header("Location: http://localhost/El3ab/browse.php");
            }
 ?>

<?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
	        {
                require_once ("class.connect.php");

                $con = new mySQL();
                $con->connect();
                $_gameID = $_POST["gameID"];
                $stmt = $con->query("DELETE FROM games WHERE GameID = ".$_gameID); 
                $con->close();                
                header("Location: /El3ab/manage.php");
            }
?>