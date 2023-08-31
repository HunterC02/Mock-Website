<!DOCTYPE html>

<!--    add_users.php    Team 1 Project Add Users Page
    12/1/2022 Team 1 Original Program
    -->
    
    <?php 
    define("FILE_AUTHOR", "William Boulton");
    ?>

    <html lang="en">
    	<head>
            <title> Floral Studio Add Users </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                input[type=text] {width:200px; height:25px;}
                input[type=email] {width:200px; height:25px;}
                input[type=password] {width:200px; height:25px;}
                input[type=submit] {width:130px; height:25px; font-family:garamond; font-size:18px; background-color:#eedbdf; border-color:#185c4f;}
                td {text-align:center; font-family:garamond;}
                .login_table {background-color:#f2e3d9; border-radius:25px; margin-left:auto; margin-right:auto; width:500px;}
                h1 {font-family:garamond;}
                .top_hr {background-color:#185c4f; height:6px; position:relative;}
                .page_links {font-size:30px; font-family:garamond}
                .logo {position:relative; top:10px;}
                .buttons {position:absolute; right:0px;}
                .logout {font-size:22px; font-family:garamond; text-align:center;}
                .creation_status {font-size:28px; font-family:garamond; text-align:center;}
                
            
            </style>
		</head>

        <header>
        
            <div class="logo"> 

                <p style="text-align:center">
                    <img src="titlelogo.png">
                </p>
            
            </div>

                <p>

                    <table>

                        <tr>

                        <td class="page_links">

                            <a href="index.php">Home</a>
                            &emsp;
                            <a href="">Products</a>
                            &emsp;
                            <a href="">About Us</a>
                            &emsp;
                            <a href="">Contact Us</a>
                            &emsp;
                            <a href="disclaimer_page.php">Disclaimer</a>

                        </td>
        

                        <td class="buttons">

                            <a href=""> <img src="menu.svg" width="25" height="25"></a>
                            &emsp;
                            <a href="login.php"><img src="user.svg" width="35" height="35"></a>
                            &emsp;
                            <a href="cart-page.html"> <img src="shoppingcart.svg" width="35" height="35"></a>
                            &emsp;

                        </td>

                        </tr>

                    </table> 

                </p>
            
        </header>

    <hr class="top_hr">

    <?php

        require "../connect_db.php";

        $q = "INSERT INTO t1_users (first_name, last_name, username, passwords";

        if (isset($_POST['first_name'])) {
            $first_name = $_POST['first_name'];
            if ($first_name == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The first name cannot be blank! </b> </p>";
            }

            if ((!(ctype_alnum($first_name))) && ($first_name != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The first name cannot have special (non-alphanumeric) characters! </b> </p>";
            }

        } else {
            $_POST['first_name'] = "";
            $first_name = "";
        }

        if (isset($_POST['last_name'])) {
            $last_name = $_POST['last_name'];
            if ($last_name == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The last name cannot be blank! </b> </p>";
            }

            if ((!(ctype_alnum($last_name))) && ($last_name != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The last name cannot have special (non-alphanumeric) characters! </b> </p>";
            }

        } else {
            $_POST['last_name'] = "";
            $last_name = "";
        }

        if (isset($_POST['userid'])) {
            $userid = $_POST['userid'];
            if ($userid == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The username cannot be blank! </b> </p>";
            }

            if ((!(ctype_alnum($userid))) && ($userid != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The username cannot have special (non-alphanumeric) characters! </b> </p>";
            }

        } else {
            $_POST['userid'] = "";
            $userid = "";
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password']; 
            if ($password == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The password cannot be blank! </b> </p>";
            }

            if ((!(ctype_alnum($password))) && ($password != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The password cannot have special (non-alphanumeric) characters! </b> </p>";
            }

        } else {
            $_POST['password'] = "";
            $password = "";
        }

        if (isset($_POST['pass_type'])) {
            $pass_type = $_POST['pass_type'];
            $q = $q . ", password_type";
        } else {
            $pass_type = "";
        }

        if (isset($_POST['orders'])) {
            $orders = $_POST['orders'];
            if (!(is_numeric($orders)) && ($orders != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The orders field must have only numbers! </b> </p>";
            }
            if ($orders != "") {
                $q = $q . ", orders";
            }
        } else {
            $orders = "";
        }

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            if ($email != "") {
                $q = $q . ", email";
            }
        } else {
            $email = "";
        }

        if (isset($_POST['user_type'])) {
            $user_type = $_POST['user_type'];
            $q = $q . ", user_type";
        } else {
            $user_type = "";
        }

        $q = $q . ") VALUES (\"$first_name\", \"$last_name\", \"$userid\", \"$password\"";

        if ($pass_type != "") {
            $q = $q . ", \"$pass_type\"";
        }

        if ($orders != "") {
            $q = $q . ", $orders";
        }

        if ($email != "") {
            $q = $q . ", \"$email\"";
        }

        if ($user_type != "") {
            $q = $q . ", \"$user_type\"";
        }

        $q = $q . ")";

        $creation_status = "";

        if (!(isset($error_message)) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
            $r = mysqli_query($dbc, $q);

            if ($r) {
                $creation_status = "<p style='color:green; font-size:20px;'> The new user account was created successfully. </p>";
            } else {
                $creation_status = "<p style='color:green; font-size:20px;'> There was an error creating the new user account. </p>";
            }
        }

        echo "<table class='login_table'>";

        echo "<form action = '' method = 'POST'>";
                
                echo "<tr> <th> $creation_status <h1> New User Account Creation </h1> </th> </tr>";
                echo "<tr> <td> <h2> First Name </h2>";
                echo "<input type='text' name='first_name' maxlength=20> </td> </tr>";
                echo "<tr> <td> <h2> Last Name </h2>";
                echo "<input type='text' name='last_name' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <h2> Username </h2>";
                echo "<input type='text' name='userid' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <h2> Password </h2>";
                echo "<input type='password' name='password' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <h2> Password Type </h2>";
                echo "<p style='font-family:garamond; font-size:24px;'>";
                echo "<input type='radio' name='pass_type' value='TEXT'> Text &emsp;";
                echo "<input type='radio' name='pass_type' value='HASHED'> Hashed </p> </td> </tr>";
                echo "<tr> <td> <h2> Number of Orders </h2>";
                echo "<input type='text' name='orders'> </td> </tr>";
                echo "<tr> <td> <h2> Email Address </h2>";
                echo "<input type='email' name='email'> </td> </tr>";
                echo "<tr> <td> <h2> User Type </h2>";
                echo "<p style='font-family:garamond; font-size:24px;'>";
                echo "<input type='radio' name='user_type' value='ADMIN'> Admin &emsp;";
                echo "<input type='radio' name='user_type' value='EMP'> Employee &emsp;";
                echo "<input type='radio' name='user_type' value='CUS'> Customer </p> </td> </tr>";
                echo "<tr> <td> <br> <input type='submit' value='Create Account' name='submit'> <br> &emsp; </tr> </td>";
                echo "</form>";

                if (isset($error_message)) {
                    echo "<tr> <td> $error_message </tr> </td>";
                    echo "</table>";
                } else {
                    echo "</table>";
                }

        include "footer.php";

    ?>