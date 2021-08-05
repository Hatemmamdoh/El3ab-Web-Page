<?php
    session_start();
?>

<html>
    <head>
        <title> Insert Game Page </title>
        <link rel="stylesheet" href="insertGameCSS.css">
    </head>

    <body style="background-image: url(bk.png)">
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

                $stmt = $con->query("SELECT * FROM games WHERE GameID = ".$_gameID);
                $game= $con->fetch($stmt);
                $con->close();
            }
     ?>

        <div class="wrapper">
            <?php
                require_once ("class.layout.php");
                $var = new myMenu();
                $var->printMenu();
            ?>
            <form action="intoDB.php" method="POST" name="myForm" class="_form" enctype="multipart/form-data" id = "container">
                <table class="table">
                    <tr>
                    <input hidden type = 'text' name ='gameID' value = <?php echo($game[1]) ?>>

                        <td>
                            <label class="lbl"> Game Name: </label>
                        </td>
                        <td>                            
                            <input value = '<?php echo($game[2]) ?>' class="txt" type="text" name="gameName" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lbl"> Description: </label>
                        </td>
                        <td>
                            <textarea id="txtarea" class="txt" type="text" name="description"> <?php echo($game[2]) ?> </textarea>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <label class="lbl"> Category: </label>
                        </td>
                        <td>
                            <select class="txt" name="category">
                                <option selected= '<?php echo($game[3]) ?>'>
<?php echo($game[3]) ?>
</option>    
                                <option value="PC">   PC    </option>
                                <option value="PS4">   PS4    </option>
                                <option value="xbox"> xBox  </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lbl"> Quantity: </label>
                        </td>
                        <td>
                            <input class="txt" type="number" name="quantity" value = '<?php echo($game[5]) ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lbl"> Price: </label>
                        </td>
                        <td>
                            <input class="txt" type="number" name="price" value = '<?php echo($game[7]) ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center>
                            <img id="output"  name="imagePath" src= <?php echo($game[6]) ?> />
                            </center>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2" >

                            <input id="submitbtn" type="button" value="Submit" onclick = "validateInsertGame()"/>
                        </td>
                    </tr>

                    <script src="myScript1.js"></script>
                </table>
            </form>
        </div>
    </body>
</html>