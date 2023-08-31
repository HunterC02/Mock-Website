<!DOCTYPE html>

<!--    product_page.php    Team 1 Project Home Page
    11/3/2022 Team 1 Original Program
    -->
    
    <?php 
    define("FILE_AUTHOR", "William Caras");
    ?>

    <html lang="en">
    	<head>
            <title> Floral Studio Tables </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                th {background-color:#85e0cf;}
                input[type=submit] {width: 105px; height:25px; font-family:garamond; font-size:18px; background-color:#eedbdf; border-color:#185c4f;}
                form {text-align:center;}
                input[type=radio] {height:20px; font-family:garamond; font-size:18px; background-color:#eedbdf; border-color:#185c4f;}
                .table_info {background-color:lightyellow;}
                .tables {table-layout:fixed; word-wrap:break-word; margin-left:auto; margin-right:auto; border-color:black; font-family:garamond; font-size:18px;}
                .top_hr {background-color:#185c4f; height:6px; position:relative;}
                .page_links {font-size:30px; font-family:garamond}
                .logo {position:relative; top:10px;}
                .buttons {position:absolute; right:0px;}
                .table_header {font-size:30px; font-family:garamond; text-align:center; font-weight:bold;}
                .table_links {font-size:24px; font-family:garamond; text-align:center;}
                .table_header_small {font-size: 24px; font-family:garamond; text-align:center;}
                .admin_header {font-size:20px; font-family:garamond; text-align:center;}
                

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

    <div>

        <header class="table_header">
            Products Table
        </header>


        </table>
     
              
            <?php
                session_start();

                require "../connect_db.php";
    
                if (isset($_POST['sort'])) {
                    $sort_type = "ORDER BY " . $_POST['sort'];
                } else {
                    $sort_type = ""; 
                }
    
                if (isset($_POST['asc_desc'])) {
                    $direction = $_POST['asc_desc'];
                } else {
                    $direction = "";
                } 
    
                if ((isset($_SESSION['active_user']))) {
                    $active_user = $_SESSION['active_user'];
                } else {
                    $active_user = "";
                }
    
         
    
                $q3 = "SELECT * FROM t1_users WHERE username = \"$active_user\" AND user_type = \"ADMIN\"";
                $r3 = mysqli_query($dbc, $q3);
    
                if (mysqli_num_rows($r3) > 0) {
    
                    echo "<p class='table_header_small'>";
                    echo "Products that we provide:";
                    echo "<br>Keep up to date with all our greatest products!";
                    echo "</p>";
    
                    echo "<table class='tables' border=1>";
    
                    echo "
                    <tr>
    
                    <th> ID </th>
                    <th> Type </th>
                    <th> Name </th>
                    <th> Price </th>
                    <th> Stock </th>
                    <th> Supplier Name </th>
                    <th> Supplier ID </th>

                    </tr>
                    ";
    
                    $q2 = "SELECT * FROM t1_products $sort_type $direction";
                    $r2 = mysqli_query($dbc, $q2);
    
                    if ($r2) {
                        while ($row = mysqli_fetch_array($r2, MYSQLI_NUM)) {
                            echo "<tr> <td class='table_info'>". $row[0] . "</td> <td class='table_info'>" . $row[1] . "</td> <td class='table_info'>" . $row[2] . "</td> <td class='table_info'>" . $row[3] . "</td> <td class='table_info'>" . $row[4] . "</td> <td class='table_info'>" . $row[5] . "</td> <td class='table_info'>" . $row[6] . "</td> </tr>";
                        }
                    } else {
                        echo "There was a problem retrieving the table data. Please try again later. If the problem persists, contact your system administrator.";
                    }
    
                    echo "</table>";
    
    
              
                    # form to choose how to sort the table
    
                    echo "<form action='' method='POST'>";
                    echo "<p style='font-family:garamond; font-size:20px;'>";
                    echo " <b> Having trouble ? Try using our sort tool to make shopping easier. </b> <br>";
                    echo "<input type='radio' name='sort' value='id'> ID";
                    echo "<input type='radio' name='sort' value='name'> Name";
                    echo "<input type='radio' name='sort' value='price'> Price";
                    echo "<input type='radio' name='sort' value='stock'> Stock";
                    echo "<input type='radio' name='sort' value='supplier_name'> Supplier Name";
                    echo "<input type='radio' name='sort' value='supplier_id'> Supplier ID";

                    echo "<br> <input type='radio' name='asc_desc' value='ASC'> Ascending";
                    echo "<input type='radio' name='asc_desc' value='DESC'> Descending";
                    echo "<br> <input type='submit' value='Sort'>";
                    echo "</p> </form>";
                    
    
                    echo "<p class='admin_header'> Click the button below to add products to the table. </p>";
                    echo "<form action='add_product.php'>";
                    echo "<input type='submit' value='Add Product'>";
                    echo "</form>";
                    
    
                }     
    
                include "footer.php";
              ?>

        </table>

          </div>
