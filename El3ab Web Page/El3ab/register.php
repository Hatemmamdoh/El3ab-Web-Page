<?php
    session_start();
?>
<html>
    <head>
        <title> Registeration Page </title>
        <link rel="stylesheet" href="insertGameCSS.css">
        <link rel="stylesheet" href="registerCSS.css">
    </head>
    <body style="background-image: url(batl2.jpg)">
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
            <form action="register.php" method="post" name="myForm" id="regForm" class = "containerRegister">
                <table >
                    <tr>
                        <td >
                            <h1 id="title" style="color:white;"> Register </h1>

                            <br>

                            <input class="txt" type="text" name="fullName" id='registerInput' placeholder="Enter the full name">

                            <br><br>
                            <input class="txt" type="email" name="email" id='registerInput' placeholder="Enter Email" required >

                            <br><br>
                            <label class="lbl" style="color:white;"> Password </label>
                            <input class="txt" type="password" name="password" id='registerInput' placeholder="Enter password"/>

                            <br><br>
                            <label class="lbl" style="color:white;"> Confirm Password </label>
                            <input class="txt" type="password" name="cpassword" id='registerInput' placeholder="confirm password"/>

                            <br><br>
                            <label class="lbl" style="color:white;"> Gender </label>
                            <select class="txt" name="gender" id='registerInput'>
                                <option value="male">   Male    </option>
                                <option value="female"> Female  </option>
                            </select>

                            <br><br>
                            <label class="lbl" style="color:white;"> Date of Birth </label>
                            <input class="txt" type="date" name="date" id='registerInput'/>

                            <br><br>
                            <input id="btn" type="button" value="Register" onclick="validateRegister()" />
                        </td>
                        <script src="myScript1.js"></script>
                    </tr>
                </table>
            </form>
        </div>
        
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
	        {
                require_once ("class.connect.php");

                $con = new mySQL();
                $con->connect();
                
                $fullName   = $_POST['fullName'];
                $email      = $_POST['email'];
                $password   = $_POST['password'];
                $gender     = $_POST['gender'];
                $date       = $_POST['date'];

                $stmt = $con->query("INSERT INTO users ( Name, email, password, Gender, DOB) VALUES( '" .$fullName."','" .$email."','".$password."','".$gender."','".$date."')");
                $con->close();
                
                
                header("Location: /El3ab/browse.php");
            }
        ?>
        
        
    </body>
</html>