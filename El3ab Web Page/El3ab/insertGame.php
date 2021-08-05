<?php
    session_start();
?>

<html>
    <head>
        <title> Insert Game Page </title>
        <link rel="stylesheet" href="insertGameCSS.css">
        <script src="myScript1.js"></script>

    </head>

    <body style="background-image: url(cod33.jpg); background-size : cover ;">
        <?php
            if ( isset( $_SESSION['user_id'] ) ) {
            } else {
                header("Location: http://localhost/El3ab/browse.php");
            }
        ?>
        <div class="wrapper">
            <?php
            require_once ("class.layout.php");
            $var = new myMenu();
            $var->printMenu();
            ?>

            <form action="insertGame.php" method="POST" name="myForm" class="_form" enctype="multipart/form-data" id = "container">
                <table class="table">
                    <tr>
                       <td>
                            <input class="txt" type="text" name="gameName"  placeholder="Enter the game name" id = "registerInput"/>
                            <textarea  class="txt" type="text" name="description" placeholder="Enter the game description" id = "registerInput"> </textarea>
      

                            <select class="txt" name="category" id = "registerInput">
                                <option value="default">   Category    </option>
                                <option value="PC">   PC    </option>
                                <option value="PS4">   PS4    </option>
                                <option value="xbox"> xBox  </option>
                            </select>

                            <input class="txt" type="number" name="quantity" placeholder="Enter the quantity" id = "registerInput"/>

                            <input class="txt" type="number" name="price" placeholder="Enter the price" id = "registerInput" />
    
                            <input id="registerInput" class="txt" type="file" name="imagePath" onchange="loadFile(event)" />
                        </td>
                     </tr>
                        <tr><td>

                            
                            <center><img id="output"  name="image" src="#" /></center>
  
                            <br>
                            <input id="submitbtn" type="button" value="Submit" onclick = "validateInsertGame()" />
                            </td></tr>
                </table>
            </form>
        </div>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
	        {
                require_once ("class.connect.php");

                $con = new mySQL();
                $con->connect();
                $_gameNAME = $_POST["gameName"];
                $_gameCategory = $_POST["category"];
                $_gameDescription = $_POST["description"];
                $_gameQuantity = $_POST["quantity"];
                $_gamePrice = $_POST["price"];
                $_gameImage = $_FILES["imagePath"]["name"];
                
                $stmt = $con->query("INSERT INTO games (UserID, GameName, Category, Description, Quantity, Price, GameImage) VALUES (".$_SESSION['user_id'].",'".$_gameNAME."','".$_gameCategory."','".$_gameDescription."',".$_gameQuantity.", " .$_gamePrice.", '".$_gameImage."' )");
                $con->close();
                
                
                header("Location: /El3ab/manage.php");
            }
         ?>
    </body>
</html>