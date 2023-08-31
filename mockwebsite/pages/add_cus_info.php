<!DOCTYPE html>

<!--    add_cus_info.php    Team 1 Project Add Customer Info
    12/1/2022 Team 1 Original Program
    -->
    
    <?php 
    define("FILE_AUTHOR", "Hunter Conway");
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

        $q = "INSERT INTO T1_CUS_INFO (username, cc_num , cc_security_code, cc_expdate , address_street, address_city, address_state, address_zipcode ";

        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            if ($username == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The username cannot be blank! </b> </p>";
            }

            if ((!(ctype_alnum($username))) && ($username != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The username cannot have special (non-alphanumeric) characters! </b> </p>";
            }

        } else {
            $_POST['username'] = "";
            $username = "";
        }

        if (isset($_POST['cc_num'])) {
            $cc_num = $_POST['cc_num'];
            if (!(is_numeric($cc_num)) && ($cc_num != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The credit card field must only have numbers! </b> </p>";
            }
            if ($cc_num != "") {
                $q = $q . ", cc_num";
            }
        } else {
            $cc_num = "";
        }


        if (isset($_POST['cc_security_code'])) {
            $cc_security_code = $_POST['cc_security_code'];
            if (!(is_numeric($cc_security_code)) && ($cc_security_code != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The Security Code must be only numbers! </b> </p>";
            }
            if ($cc_security_code != "") {
                $q = $q . ", cc_security_code";
            }
        } else {
            $cc_security_code = "";
        }

        if (isset($_POST['cc_expdate'])) {
            $cc_expdate = $_POST['cc_expdate'];
            if  ($cc_expdate = "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: Card expiration date cannot be empty! </b> </p>";
            }
        } else {
            $_POST['cc_expdate'] = "";
            $cc_expdate = "";
        }


        if (isset($_POST['address_street'])) {
            $address_street = $_POST['address_street'];
            if ($address_street == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The street addresss cannot be blank! </b> </p>";
            }

        } else {
            $_POST['address_street'] = "";
            $address_street = "";
        }


        if (isset($_POST['address_city'])) {
            $address_city = $_POST['address_city'];
            if ($address_city == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The addresss's city cannot be blank! </b> </p>";
            }

        } else {
            $_POST['address_city'] = "";
            $address_city = "";
        }


        if (isset($_POST['address_state'])) {
            $address_state = $_POST['address_state'];
            if ($address_state == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The state of address cannot be blank! </b> </p>";
            }

        } else {
            $_POST['address_state'] = "";
            $address_state = "";
        }


        if (isset($_POST['address_zipcode'])) {
            $address_zipcode = $_POST['address_zipcode'];
            if (!(is_numeric($address_zipcode)) && ($address_zipcode != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The zip code must be only numbers! </b> </p>";
            }
            if ($address_zipcode != "") {
                $q = $q . ", address_zipcode";
            }
        } else {
            $address_zipcode = "";
        }


        $creation_status = "";

        if (!(isset($error_message)) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
            $r = mysqli_query($dbc, $q);

            if ($r) {
                $creation_status = "<p style='color:green; font-size:20px;'> New customer account was created successfully. </p>";
            } else {
                $creation_status = "<p style='color:green; font-size:20px;'> There was an error creating the new customer account. </p>";
            }
        }

        echo "<table class='login_table'>";

        echo "<form action = '' method = 'POST'>";
                
                echo "<tr> <th> $creation_status <h1> New Customer Info </h1> </th> </tr>";
                echo "<tr> <td> <h2>Username</h2>";
                echo "<input type='text' name='username' maxlength=20> </td> </tr>";
                echo "<tr> <td> <h2> Credit Card Number </h2>";
                echo "<input type='text' name='cc_num' minlength=16 maxlength=16>";
                echo "<h2> CC Secuirty Code </h2>";
                echo "<input type='text' name='cc_security_code' minlength=3 maxlength=3>";
                echo "<h2> CC Exp Date </h2>";
                echo "<input type='text' name='cc_expdate' maxlength=5> </td> </tr>";
                echo "<tr> <td> <h2> Street Address </h2>";
                echo "<input type='text' name='address_street'> </td> </tr>"; 
                echo "<tr> <td> <h2> City of Address</h2>";
                echo "<input type='text' name='address_city'> </td> </tr>"; 
                echo "<tr> <td> <h2> State of Address</h2>";
                echo "<input type='text' name='address_state'> </td> </tr>"; 
                echo "<tr> <td> <h2> Zip Code</h2>";
                echo "<input type='text' name='address_zipcode'minlength=5 maxlength=5>  </td> </tr>"; 
                
                echo "<tr> <td> <br> <input type='submit' value='Add Product' name='submit'> <br> &emsp; </tr> </td>";
                echo "</form>";

                if (isset($error_message)) {
                    echo "<tr> <td> $error_message </tr> </td>";
                    echo "</table>";
                } else {
                    echo "</table>";
                }

        include "footer.php";

    ?>