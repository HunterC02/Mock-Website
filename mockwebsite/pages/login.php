<!DOCTYPE html>

<!--    login.php    Team 1 Project Login Page
    11/17/2022 Team 1 Original Program
    -->

    
    <html lang="en">
    	<head>
            <title> Floral Studio Login </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                input[type=text] {width:200px; height:25px;}
                input[type=password] {width:200px; height:25px;}
                input[type=submit] {width:100px; height:25px; font-family:garamond; font-size:18px; background-color:#eedbdf; border-color:#185c4f;}
                td {text-align:center; font-family:garamond;}
                .login_table {background-color:#f2e3d9; border-radius:25px; margin-left:auto; margin-right:auto; width:500px;}
                h1 {font-family:garamond;}
                .top_hr {background-color:#185c4f; height:6px; position:relative;}
                .page_links {font-size:30px; font-family:garamond}
                .logo {position:relative; top:10px;}
                .buttons {position:absolute; right:0px;}
                .logout {font-size:22px; font-family:garamond; text-align:center;}


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
                            <a href="product_page.php">Products</a>
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

            session_start();

            define("FILE_AUTHOR", "William Boulton");

            include "../connect_db.php";

            if (isset($_SESSION['login_status'])) {
                $login_status = $_SESSION['login_status'];
            } else {
                $login_status = "NOT LOGGED IN";
            }

            if (isset($_POST['userid'])) {
                $userid = $_POST['userid'];
                if ($userid == "") {
                    $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The username cannot be blank! </b> </p>";
                }

                if ((!(ctype_alnum($userid))) && ($userid != "")) {
                    $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The username cannot have special (non-alphanumeric) characters! </b> </p>";
                }

            }

            if (isset($_POST['password'])) {
                $password = $_POST['password']; 
                if ($password == "") {
                    $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The password cannot be blank! </b> </p>";
                }

                if ((!(ctype_alnum($password))) && ($password != "")) {
                    $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The password cannot have special (non-alphanumeric) characters! </b> </p>";
                }

            }

            if (!(isset($_SESSION['active_first_name']))) {
                $_SESSION['active_first_name'] = "";
            }

            if ((isset($userid)) && (isset($password))) {
                $q = "SELECT * FROM t1_users WHERE username = \"$userid\" AND passwords = \"$password\"";
                $r = mysqli_query($dbc, $q);
            } else {
                $r = false;
            }

            if ($r) {
                # checks if the username and password is in the database, outputs an error if it is not
                if (mysqli_num_rows($r) == 0) {
                    if (!(isset($error_message))) {
                        $error_message = "<p style='color:red; font-size:20px;'> <b> Error: Invalid username/password combination. </b> </p>";
                    }
                } else {
                    # this runs when the username and password match an entry in the database, sets the session login status to "LOGGED IN" before it is echoed out for the first time so that when the user clicks submit, it will say "LOGGED IN" instead of having to wait for a second page refresh
                    $_SESSION['login_status'] = "LOGGED IN";
                    $login_status = "LOGGED IN";
                    # active_user session variable is set so that the page can remember which user is currently logged in when they close the tab and reopen it
                    $_SESSION['active_user'] = $userid;

                    $q2 = "SELECT first_name FROM t1_users WHERE username = \"$userid\"";
                    $r2 = mysqli_query($dbc, $q);

                    if ($r2) {
                        $row = mysqli_fetch_array($r2, MYSQLI_NUM);
                        $_SESSION['active_first_name'] = $row[1];
                        }

                }
            } 

            echo "<table class='login_table'>";

                if ((($_SERVER["REQUEST_METHOD"] == "GET") || (isset($error_message))) && ($login_status == "NOT LOGGED IN")) {
                echo "<form action = '' method = 'POST'>";
                
                echo "<tr> <th> <h1> User Login </h1> </th> </tr>"; 
                echo "<tr> <td> <h2> Username </h2>";
                echo "<input type='text' name='userid'> </td> </tr>"; 
                echo "<tr> <td> <h2> Password </h2>";
                echo "<input type='password' name='password'> </td> </tr>"; 
                echo "<tr> <td> <br> <input type='submit' value='Log In' name='submit'> <br> &emsp; </tr> </td>";
                echo "</form>";
                echo "<tr> <td> <h3> If you do not have an account, click <a href='create_account.php'>here</a> to create one. </h3> </tr> </td>";

                if (isset($error_message)) {
                    echo "<tr> <td> $error_message </tr> </td>";
                    echo "</table>";
                } else {
                    echo "</table>";
                }


            }

            if (($_SERVER["REQUEST_METHOD"] == "POST") && (!(isset($error_message)))) {
                $_SESSION['login_status'] = "LOGGED IN";
                include "table_page.php";

                echo "<p class='logout'> If you wish to log out, click here: <br>";
                echo "<a href='logout.php'>Log Out </a>";
                echo "</p>";
            } else if (($_SERVER["REQUEST_METHOD"] == "GET") && (!(isset($error_message))) && (isset($_SESSION['active_user']))) {
                $_SESSION['login_status'] = "LOGGED IN";
                include "table_page.php";
                
                echo "<p class='logout'> If you wish to log out, click here: <br>";
                echo "<a href='logout.php'>Log Out </a>";
                echo "</p>";
            }

            include "footer.php";


        ?>


    </html>