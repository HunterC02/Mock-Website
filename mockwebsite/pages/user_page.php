<!DOCTYPE html>

<!--    users.php    Team 1 Project Users Table Page
    12/1/2022 Team 1 Original Program
    -->
    
    <?php 
    define("FILE_AUTHOR", "William Boulton");
    ?>

    <html lang="en">
    	<head>
            <title> Floral Studio Tables </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                th {background-color:#85e0cf;}
                input[type=submit] {width:100px; height:25px; font-family:garamond; font-size:18px; background-color:#eedbdf; border-color:#185c4f;}
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

    <div>

        <header class="table_header">
            Users Table
        </header>

        <p class="table_header_small">
            Users Table Explained:
        </p>

        <table class="tables" border=1>

            <tr>
                
                <th> Field </th>
                <th> Type </th>
                <th> Null </th>
                <th> Key </th>
                <th> Default </th>
                <th> Extra </th>   

            </tr>

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

            $q1 = "EXPLAIN t1_users";
            $r1 = mysqli_query($dbc, $q1);

            if ($r1) {
                while ($row = mysqli_fetch_array($r1, MYSQLI_NUM)) {
                    echo "<tr> <td class='table_info'>". $row[0] . "</td> <td class='table_info'>" . $row[1] . "</td> <td class='table_info'>" . $row[2] . "</td> <td class='table_info'>" . $row[3] . "</td> <td class='table_info'>" . $row[4] . "</td> <td class='table_info'>" . $row[5] . "</td> </tr>";
                }
            } else {
                echo "There was a problem retrieving the table data. Please try again later. If the problem persists, contact your system administrator.";
            }

            echo "</table>";

        

            $q3 = "SELECT * FROM t1_users WHERE username = \"$active_user\" AND user_type = \"ADMIN\"";
            $r3 = mysqli_query($dbc, $q3);

            if (mysqli_num_rows($r3) > 0) {

                echo "<p class='table_header_small'>";
                echo "Users Table Information:";
                echo "</p>";

                echo "<table class='tables' border=1>";

                echo "
                <tr>

                <th> ID </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Username </th>
                <th> Passwords </th>
                <th> Password Type </th>
                <th> Orders </th>
                <th> Email </th>
                <th> User Type </th>
                <th> Flagged for Deletion </th>

                </tr>
                ";

                $q2 = "SELECT * FROM t1_users $sort_type $direction";
                $r2 = mysqli_query($dbc, $q2);

                if ($r2) {
                    while ($row = mysqli_fetch_array($r2, MYSQLI_NUM)) {
                        echo "<tr> <td class='table_info'>". $row[0] . "</td> <td class='table_info'>" . $row[1] . "</td> <td class='table_info'>" . $row[2] . "</td> <td class='table_info'>" . $row[3] . "</td> <td class='table_info'>" . $row[4] . "</td> <td class='table_info'>" . $row[5] . "</td> <td class='table_info'>" . $row[6] . "</td> <td class='table_info'>" . $row[7] . "</td> <td class='table_info'>" . $row[8] . "</td> <td class='table_info'>" . $row[9] . "</td> </tr>";
                    }
                } else {
                    echo "There was a problem retrieving the table data. Please try again later. If the problem persists, contact your system administrator.";
                }

                echo "</table>";

                # form to choose how to sort the table
                echo "<form action='' method='POST'>";
                echo "<p style='font-family:garamond; font-size:20px;'>";
                echo "Select one of these buttons to sort the table by that field. <br>";
                echo "<input type='radio' name='sort' value='id'> ID";
                echo "<input type='radio' name='sort' value='first_name'> First Name";
                echo "<input type='radio' name='sort' value='last_name'> Last Name";
                echo "<input type='radio' name='sort' value='username'> Username";
                echo "<input type='radio' name='sort' value='passwords'> Passwords";
                echo "<input type='radio' name='sort' value='password_type'> Password Type";
                echo "<input type='radio' name='sort' value='orders'> Orders";
                echo "<input type='radio' name='sort' value='email'> Email";
                echo "<input type='radio' name='sort' value='user_type'> User Type";
                echo "<input type='radio' name='sort' value='deleted'> Flagged for Deletion";
                echo "<br> <input type='radio' name='asc_desc' value='ASC'> Ascending";
                echo "<input type='radio' name='asc_desc' value='DESC'> Descending";
                echo "<br> <input type='submit' value='Sort'>";
                echo "</p> </form>";
                

                echo "<p class='admin_header'> <br> Click the button below to add more users to the table. </p>";
                echo "<form action='add_users.php'>";
                echo "<input type='submit' value='Add Users'>";
                echo "</form>";
                

            } else { # error message if a user who is not an admin tries to access the users table
                echo "<p class='admin_header'> Only accounts with the Admin status can view the contents of the users table.";
            }


            include "footer.php";

        ?>

    </div>
