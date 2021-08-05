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
                $_gameNAME = $_POST["gameName"];
                $_gameCategory = $_POST["category"];
                $_gameDescription = $_POST["description"];
                $_gameQuantity = $_POST["quantity"];
                $_gamePrice = $_POST["price"];;
                

                $stmt = $con->query("UPDATE games SET GameName = '".$_gameNAME."' , Category = '".$_gameCategory."' , Description = '".$_gameDescription."' , Quantity = ".$_gameQuantity." , Price = ".$_gamePrice."  Where GameID = ".$_gameID); 
                $con->close();
                
                
                header("Location: /El3ab/manage.php");
            }
?>