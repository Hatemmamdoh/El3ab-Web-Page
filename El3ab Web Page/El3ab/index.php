<?php
    session_start();
    if ( !isset( $_SESSION['user_id'] ) ) {
    } else {
        header("Location: /El3ab/browse.php");
    }
?>


<!DOCTYPE html>
    <html>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="hatem.css">
        <body>
            <nav class="w3-bar w3-black">                
                <a href="http://localhost/El3ab/browse.php" class="w3-button w3-bar-item">Browse</a>
                <a href="http://localhost/El3ab/register.php" class="w3-button w3-bar-item">Register</a>
                <a href="http://localhost/El3ab/login.php" class="w3-button w3-bar-item">Login</a>
            </nav>
            <section>
                <img class="ima" src="batl.jpg"  style="width:100%; height:50%">
                <img class="ima" src="batl2.jpg" style="width:100%; height:50%">
                <img class="ima" src="fifa.jpg"  style="width:100%; height:50%">
            </section>
  
            <script>
                var myIndex = 0;
                carousel();

                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("ima");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    myIndex++;
                    if (myIndex > x.length) {
                        myIndex = 1
                    }
                    x[myIndex-1].style.display = "block";
                    setTimeout(carousel, 3000);
                }
            </script>
            <section class="w3-container w3-center" style="max-width:600px; margin-top:30px;">
                <center>
                    <img  src='lgo.png'/>
                </center>
            </section>
  
            <section class="w3-container w3-content w3-center" style="max-width:700px">
                <h3 style="color: #000000; margin-top:-130px;">
                    We have created a games Store website you can now buy any used games you want or sell game 
                    you have.
                </h3>
            </section>
            <footer style="max-height:20px;" class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
                <p style="margin-top:-10px; font-size:10pt;">
                    All Copy Right saved for FCI-IT-Course-Students
                </p>
            </footer>
        </body>
</html>