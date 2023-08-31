<!DOCTYPE html>

<!--    logout.php    Team 1 Project Logout Page
    11/17/2022 Team 1 Original Program
    -->

    
    <html lang="en">
    	<head>
            <title> Floral Studio Logged Out </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                h1 {font-family:garamond; text-align:center;}
                .top_hr {background-color:#185c4f; height:6px; position:relative;}
                .page_links {font-size:30px; font-family:garamond}
                .logo {position:relative; top:10px;}
                .buttons {position:absolute; right:0px;}
                .logged_out {font-size:22px; font-family:garamond; text-align:center;}


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

            unset($_SESSION['login_status']);
            unset($_SESSION['active_first_name']);
            unset($_SESSION['active_user']);
            unset($_SESSION['account_status']);

        ?>

        <p class='logged_out'> 
            <h1>
                You have successfully logged out. You can safely close the website or click <a href="index.php">here</a> to return to the home page.
            </h1>
        </p>

        <?php

        include "footer.php";

        ?>
    
    </html>