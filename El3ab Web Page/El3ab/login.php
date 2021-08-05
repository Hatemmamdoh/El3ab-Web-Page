<?php
    session_start();
?>

<html>
    <head>
        <title>login </title>
        <link rel="stylesheet" href="insertGameCSS.css">
        <script src="myScript1.js"></script>
        <script type ="text/javascript" src = "jquery-3.4.1.min.js"> </script>
        <script type ="text/javascript" >
        $(function (){
            $("#login").submit( function(){
            var email = $("#loginEmail").val();
            var password = $("#loginPassword").val();
            if (email == ""){
                alert('Please Enter Email!');
                return false;
            } else if (password == ""){
                alert('Please Enter Password');
                return false;
            } else {
                return true;
            }
            })
 
          })
        </script>
    </head>
    <body style="background-image: url(batl2.jpg); 
  background-size : cover ;">
        <?php
            if ( !isset( $_SESSION['user_id'] ) ) {
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
            <form action="" method="post" id='login' class="container">
                <label for="email"><h2 style="color:white;" >Login</h2></label>

                <input type="text" name="email" id="loginEmail" placeholder="Email: " class="loginField" >
                <br><br>
                <input type="password" name="password" id="loginPassword" placeholder="Password" class="loginField" >
                <br><br>
                <input type="submit" value="Login" id="loginBtn" >
            </form>
        </div>
        
        <?php
        if ( ! empty( $_POST ) ) {
            if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
                // Getting submitted user data from database
                require_once ("class.connect.php");

                $con = new mySQL();
                $con->connect();
                $stmt = $con->query("SELECT * FROM users WHERE email = '" . $_POST['email'] ."'");

                $array = $con->fetch($stmt);

                $textPassword = $_POST['password'];
                $dbPassword = $array[2];
                
                if ( $dbPassword == ""){
                    echo ("<center><h3>No such email found!</h3></center>");
                }

                else if ( $textPassword == $dbPassword ){
                    $_SESSION['user_id'] = $array[0];
                    header("Location: http://localhost/El3ab/browse.php");
                }
                else{
                    echo ("<center><h3>Wrong Password!</h3></center>");
                }
            }
        }
        ?>
    </body>

</html>