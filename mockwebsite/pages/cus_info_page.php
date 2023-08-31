<!DOCTYPE html>

<!--    cus_info_page.php    Team 1 Project Customer Info Table Page
    11/3/2022 Team 1 Original Program
    -->
    
    <?php 
    define("FILE_AUTHOR", "Hunter Conway");
    ?>

    <html lang="en">
    	<head>
            <title> Floral Studio Tables </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                th {background-color:#85e0cf;}
                .table_info {background-color:lightyellow;}
                .tables {table-layout:fixed; word-wrap:break-word; margin-left:auto; margin-right:auto; border-color:black; font-family:garamond; font-size:18px;}
                .top_hr {background-color:#185c4f; height:6px; position:relative;}
                .page_links {font-size:30px; font-family:garamond}
                .logo {position:relative; top:10px;}
                .buttons {position:absolute; right:0px;}
                .table_header {font-size:30px; font-family:garamond; text-align:center; font-weight:bold;}
                .table_links {font-size:24px; font-family:garamond; text-align:center;}
                .table_header_small {font-size: 24px; font-family:garamond; text-align:center;}
            
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
        Customer Table
    </header>
    

    <?php
    #Get the passed direction type from input form
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
            echo "Customer Info Table Information:";
            echo "</p>";

            echo "<table class='tables' border=1>";

            echo "
            <tr>

            <th> ID </th>
            <th> Username </th>
            <th> Credit Card </th>
            <th> CC Security Code </th>
            <th> CC Expiration Date </th>
            <th> Street Address </th>
            <th> City </th>
            <th> State </th>
            <th> Zip Code </th>
            <th> Flagged for Deletion </th>

            </tr>
            ";

            $q2 = "SELECT * FROM t1_cus_info $sort_type $direction";
            $r2 = mysqli_query($dbc, $q2);

            if ($r2) {
                while ($row = mysqli_fetch_array($r2, MYSQLI_NUM)) {
                    echo "<tr> <td class='table_info'>". $row[0] . "</td> <td class='table_info'>" . $row[1] . "</td> <td class='table_info'>" . $row[2] . "</td> <td class='table_info'>" . $row[3] . "</td> <td class='table_info'>" . $row[4] . "</td> <td class='table_info'>" . $row[5] . "</td> <td class='table_info'>" . $row[6] . "</td> <td class='table_info'>" . $row[7] . "</td> <td class='table_info'>" . $row[8] . "</td> <td class='table_info'>" . $row[9] ."</td> </tr>";
                }
            } else {
                echo "There was a problem retrieving the table data. Please try again later. If the problem persists, contact your system administrator.";
            }

            echo "</table>";

        #Sorting Buttons  
        echo "<form action='' method= 'POST'>";
        echo "<p style='font-family:garamond; '>";
        echo "<center><h3><input type='radio' name='sort' value='id'>  ID ";  
        echo "<input type='radio' name='sort' value='username'> Username </h3> </center> "; 
        echo "<center> <h3> <input type='radio' name='sort' value='cc_num'> Credit Card ";
        echo " <input type='radio' name='sort' value='cc_security_code'> CC Security Code </h3> </center>";
        echo "<center> <h3><input type='radio' name='sort' value='cc_expdate'> CC Expiration Date ";
        echo " <input type='radio' name='sort' value='address_street'> Street Address </h3> </center>";
        echo "<center> <h3><input type='radio' name='sort' value='address_city' > City";
        echo "<input type='radio' name='sort' value='address_state'> State ";
        echo "<input type='radio' name='sort' value='address_zipcode'> Zip Code ";
        echo "<input type='radio' name='sort' value='deleted'> Flagged for Deletion</h3> </center>";


        echo "<center><h3><input type='radio' name='direction' value='DESC'> High to Low";
        echo "<input type='radio' name='direction' value='ASC'> Low to High </h3> </center> ";
        echo "<br><center>  <input type='submit' value='Sort Customer Info' style='height:55px; width:150px; font: bold 15px arial, sans-serif'>  </center> ";

        echo "</form>";

        echo "<center><p class='admin_header'> <br> Click the button below to add more customer info to the table. </p>";
        echo "<form action='add_cus_info.php'>";
        echo "<input type='submit' value='Add Customer Info'></center>";
        echo "</form>";


    } else { # error message if a user who is not an admin tries to access the users table
        echo "<p class='admin_header'> Only accounts with the Admin status can view the contents of the users table.";
    }


        include "footer.php";
    ?>