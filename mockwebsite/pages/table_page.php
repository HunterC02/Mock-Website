<!DOCTYPE html>

<!--    table_page.php    Team 1 Project Table Page
    11/17/2022 Team 1 Original Program
    -->
    
    <html lang="en">
    	<head>
            <title> Floral Studio Tables </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                .table_header {font-size:30px; font-family:garamond; text-align:center; font-weight:bold;}
                .table_links {font-size:24px; font-family:garamond; text-align:center;}
            
            </style>
		</head>


        <div>
            <header class="table_header">
                <?php

                    echo "Welcome back, " . $_SESSION['active_first_name'] . ".";

                ?>
            </header>

            <p class="table_links">

                Choose a table to view:
                <br>

                <a href="user_page.php"> Users </a>
                <br>
                <a href="product_page.php"> Products </a>
                <br>
                <a href="cus_info_page.php"> Customer Info </a>
                <br>
                <a href="supplier_page.php"> Suppliers </a>

            </p>

        </div>
