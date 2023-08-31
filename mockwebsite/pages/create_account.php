<!DOCTYPE html>

<!--    create_account.php    Team 1 Project Create Account Page
    12/1/2022 Team 1 Original Program
    -->

    
    <html lang="en">
    	<head>
            <title> Floral Studio Accounts </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                input[type=text] {width:200px; height:25px;}
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
                            <a href="/Users/student/Photos/Personal information/Marist2021/SD2 /cart-page.html"> <img src="shoppingcart.svg" width="35" height="35"></a>
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

            if (isset($_SESSION['account_status'])) {
                $account_status = $_SESSION['account_status'];
            } else {
                $account_status = "NOT CREATED";
            }
        
            if (isset($_POST['first_name'])) {
                $first_name = $_POST['first_name'];
                if ($first_name == "") {
                    $error_message = "<p style='color:red; font-size:20px;'> <b> Error: Your first name cannot be blank! </b> </p>";
                }

                if ((!(ctype_alnum($first_name))) && ($first_name != "")) {
                    $error_message = "<p style='color:red; font-size:20px;'> <b> Error: Your first name cannot have special (non-alphanumeric) characters! </b> </p>";
                }

            }

            if (isset($_POST['last_name'])) {
                $last_name = $_POST['last_name'];
                if ($last_name == "") {
                    $error_message = "<p style='color:red; font-size:20px;'> <b> Error: Your last name cannot be blank! </b> </p>";
                }

                if ((!(ctype_alnum($last_name))) && ($last_name != "")) {
                    $error_message = "<p style='color:red; font-size:20px;'> <b> Error: Your last name cannot have special (non-alphanumeric) characters! </b> </p>";
                }

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

            # inserts new account into table
            if (((isset($userid)) && (isset($password))) && (!(isset($error_message)))) {
                $q = "INSERT INTO t1_users (first_name, last_name, username, passwords) VALUES (\"$first_name\", \"$last_name\", \"$userid\", \"$password\")";
                $r = mysqli_query($dbc, $q);
            }

            # checks if input was successful
            if ((isset($r))) {

                if ($r) {
                    $account_status = "CREATED";
                    $_SESSION['account_status'] = "CREATED";
                    echo "<p class='creation_status'> <b> Your account has been successfully created. You can safely close this page or click <a href='login.php'>here</a> to return to the login page. </b> </p>";

                } else {
                    $account_status = "NOT CREATED";
                    $_SESSION['account_status'] = "NOT CREATED";
                    echo "<p style='color:red; font-size:20px;'> <b> There was an error creating your account. If this persists, contact the system adminstrator. Click <a href='login.php'>here</a> to return to the login page. </b> </p>";
                    die;
                }

            }

            # outputs the account creation formc 
            echo "<table class='login_table'>";

            if ((($_SERVER["REQUEST_METHOD"] == "GET") || (isset($error_message))) && (($account_status == "NOT CREATED") && $login_status == "NOT LOGGED IN")) {
                echo "<form action = '' method = 'POST'>";
                    
                echo "<tr> <th> <h1> Account Creation </h1> </th> </tr>";
                echo "<tr> <td> <h2> First Name </h2>";
                echo "<input type='text' name='first_name' maxlength=20> </td> </tr>";
                echo "<tr> <td> <h2> Last Name </h2>";
                echo "<input type='text' name='last_name' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <h2> Username </h2>";
                echo "<input type='text' name='userid' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <h2> Password </h2>";
                echo "<input type='password' name='password' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <br> <input type='submit' value='Create Account' name='submit'> <br> &emsp; </tr> </td>";
                echo "</form>";
            

                if (isset($error_message)) {
                    echo "<tr> <td> $error_message </tr> </td>";
                    echo "</table>";
                } else {
                    echo "</table>";
                }

            } else if ($login_status == "LOGGED IN") {
                echo "<p class='creation_status'> <b> You are already logged in. You can safely close this page or click <a href='logout.php'>here</a> to log out.";
            } else if (($account_status == "CREATED") && ($_SERVER["REQUEST_METHOD"] == "GET")) {
                echo "<p class='creation_status'> <b> You already created an account. You can safely close this page or click <a href='login.php'>here</a> to return to the login page.";
            }

            include "footer.php";


        ?>

    </html>