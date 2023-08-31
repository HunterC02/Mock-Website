<!DOCTYPE html>

<!--    add_product.php    Team 1 Project Add Product Page
    12/1/2022 Team 1 Original Program
    -->
    
    <?php 
    define("FILE_AUTHOR", "William Caras");
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

        $q = "INSERT INTO t1_products (type, name, price , stock ";

        if (isset($_POST['type'])) {
            $type = $_POST['type'];
            if ($type == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The type name cannot be blank! </b> </p>";
            }

            if ((!(ctype_alnum($type))) && ($type != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The first name cannot have special (non-alphanumeric) characters! </b> </p>";
            }

        } else {
            $_POST['type'] = "";
            $type = "";
        }

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            if ($name == "") {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The name cannot be blank! </b> </p>";
            }

            if ((!(ctype_alnum($name))) && ($name != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The name cannot have special (non-alphanumeric) characters! </b> </p>";
            }

        } else {
            $_POST['name'] = "";
            $name = "";
        }


        if (isset($_POST['price'])) {
            $price = $_POST['price'];
            if (!(is_numeric($price)) && ($price != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The price field must have only numbers! </b> </p>";
            }
            if ($price != "") {
                $q = $q . ", price";
            }
        } else {
            $price = "";
        }

        if (isset($_POST['stock'])) {
            $stock = $_POST['stock'];
            if (!(is_numeric($stock)) && ($stock != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The stock field must have only numbers! </b> </p>";
            }
            if ($stock != "") {
                $q = $q . ", stock";
            }
        } else {
            $stock = "";
        }


        if (isset($_POST['supplier_name'])) {
            $supplier_name = $_POST['supplier_name'];
            $q = $q . ", supplier_name";
        } else {
            $supplier_name = "";
        } 

       
        if (isset($_POST['supplier_id'])) {
            $supplier_id = $_POST['supplier_id'];
            if (!(is_numeric($supplier_id)) && ($supplier_id != "")) {
                $error_message = "<p style='color:red; font-size:20px;'> <b> Error: The supplier id field must have only numbers! </b> </p>";
            }
            if ($supplier_id != "") {
                $q = $q . ", supplier_id";
            }
        } else {
            $supplier_id = "";
        }


        $q = $q . ") VALUES (\"$type\", \"$name\", \"$price\", \"$stock\"";

        if ($supplier_name != "") {
            $q = $q . ", \"$supplier_name\"";
        }

        if ($supplier_id != "") {
            $q = $q . ", $supplier_id";
        }

        $q = $q . ")";

        $creation_status = "";

        if (!(isset($error_message)) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
            $r = mysqli_query($dbc, $q);

            if ($r) {
                $creation_status = "<p style='color:green; font-size:20px;'> The new product was created successfully. </p>";
            } else {
                $creation_status = "<p style='color:green; font-size:20px;'> There was an error creating the new product. </p>";
            }
        }

        echo "<table class='login_table'>";

        echo "<form action = '' method = 'POST'>";
                
                echo "<tr> <th> $creation_status <h1> Product Adder </h1> </th> </tr>";
                echo "<tr> <td> <h2>Type</h2>";
                echo "<input type='text' name='type' maxlength=20> </td> </tr>";
                echo "<tr> <td> <h2> Product Name </h2>";
                echo "<input type='text' name='name' maxlength=20> </td> </tr>"; 
                echo "<tr> <td> <h2> Price of Product </h2>";
                echo "<input type='text' name='price'> </td> </tr>"; 
                echo "<tr> <td> <h2> Stock </h2>";
                echo "<input type='text' name='stock'> </td> </tr>"; 
                echo "<tr> <td> <h2> Supplier Name </h2>";
                echo "<p style='font-family:garamond; font-size:24px;'>";
                echo "<input type='radio' name='supplier_name' value='Seedy Place'> Seedy Place &emsp;";
                echo "<input type='radio' name='supplier_name' value='Trowel World'> Trowel World &emsp;";
                echo "<input type='radio' name='supplier_name' value='Dirt & Stuff'> Dirt & Stuff </p> </td> </tr>";
                echo "<tr> <td> <h2> Supplier id </h2>";
                echo "<input type='text' name='supplier_id'> </td> </tr>";
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