<!DOCTYPE html>

<!--    add_supplier.php    Team 1 Project Add supplier Page
    12/1/2022 Team 1 Original Program
    -->
    
    <?php 
    define("FILE_AUTHOR", "Madeleine Cavanagh");
    ?>

    <html lang="en">
    	<head>
            <title> Floral Studio Add Suppliers </title>
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
                            <a href="product_page.php">Products</a>
                            &emsp;
                            <a href="">About Us</a>
                            &emsp;
                            <a href="">Contact Us</a>
                            &emsp;
                            <a href="disclaimer_page.php">Disclaimer</a>

                        </td>
        

                        <td class="buttons">

                            <a href="index.php"> <img src="menu.svg" width="25" height="25"></a>
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

        $q = "INSERT INTO t1_suppliers (name, num_inventory_items, contact_phone_num, contact_name, contact_email)";

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            if ($name == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The companies name cannot be blank! </b> </p>";
            }
        
        } else {
            $_POST['name'] = "";
            $name = "";
        }

        if (isset($_POST['num_inventory_items'])) {
            $num_inventory_items = $_POST['num_inventory_items'];
            if ($num_inventory_items == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The number of inventory cannot be blank! </b> </p>";
            }
            
            if ((!(ctype_alnum($num_inventory_items))) && ($num_inventory_items != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The number of inventory cannot have special characters! </b> </p>";
            }

        } else {
            $_POST['num_inventory_items'] = "";
            $last_name = "";
        }

        if (isset($_POST['contact_phone_num'])) {
            $contact_phone_num = $_POST['contact_phone_num'];
            if ($contact_phone_num == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The phone number cannot be blank! </b> </p>";
            }
            
            if ((!(ctype_alnum($contact_phone_num))) && ($contact_phone_num != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The phone number cannot have special characters! </b> </p>";
            }
        } else {
            $_POST['contact_phone_num'] = "";
            $userid = "";
        }

        if (isset($_POST['contact_name'])) {
            $contact_name = $_POST['contact_name']; 
            if ($contact_name == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The contact name cannot be blank! </b> </p>";
            }
           
        } else {
            $_POST['contact_name'] = "";
            $contact_name = "";
        }



        if (isset($_POST['contact_email'])) {
            $contact_email = $_POST['contact_email']; 
            if ($contact_email == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The contact email cannot be blank! </b> </p>";
            }

        } else {
            $_POST['contact_email'] = "";
            $contact_email = "";
        }

        $q = $q . " VALUES (\"$name\", \"$num_inventory_items\", \"$contact_phone_num\", \"$contact_name\", \"$contact_email\")";

        $creation_status = "";

        if (!(isset($error_message)) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
            $r = mysqli_query($dbc, $q);

            if ($r) {
                $creation_status = "<p style='color:green; font-size:20px;'> The Supplier was created successfully. </p>";
            } else {
                $creation_status = "<p style='color:green; font-size:20px;'> There was an error creating the supplier. </p>" . mysqli_error($dbc);
            }
        }

        echo "<table class='login_table'>";

        echo "<form action = '' method = 'POST'>";
                
                echo "<tr> <th> $creation_status <h1> New Supplier Creation </h1> </th> </tr>";
                echo "<tr> <td> <h2> Company Name </h2>";
                echo "<input type='text' name='name' maxlength=20> </td> </tr>";
                echo "<tr> <td> <h2> Inventory Number </h2>";
                echo "<input type='text' name='num_inventory_items' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <h2> Contact Phone Number </h2>";
                echo "<input type='text' name='contact_phone_num' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <h2> Contact Name </h2>";
                echo "<input type='text' name='contact_name' maxlength=20> </td> </tr>"; 


                echo "<tr> <td> <h2> Contact Email Address </h2>";
                echo "<input type='email' name='contact_email'> </td> </tr>";
         
                echo "<tr> <td> <br> <input type='submit' value='Add Supplier' name='submit'> <br> &emsp; </tr> </td>";
                echo "</form>";

                if (isset($error_message)) {
                    echo "<tr> <td> $error_message </tr> </td>";
                    echo "</table>";
                } else {
                    echo "</table>";
                }

        include "footer.php";

    ?>