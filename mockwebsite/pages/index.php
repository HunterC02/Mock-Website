<!DOCTYPE html>

<!--    index.php    Team 1 Project Home Page
    11/3/2022 Team 1 Original Program
    -->
    
    <html lang="en">
    	<head>
            <title> Floral Studio Home Page </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                .top_hr {background-color:#185c4f; height:6px; position:relative;}
                .page_links {font-size:30px; font-family:garamond}
                .logo {position:relative; top:10px;}
                .buttons {position:absolute; right:0px;}
                .signup {background-color:hsl(0, 0%, 100%);font-size:25px; font-family:garamond;}
                .description{background-color:#185c4f;font-size:25px; font-family:garamond; text-align:center}
                .search {position:absolute; right:0px;}
                .top_searches {font-size:20px; font-family:garamond}
                .explore_header {font-size:30px; font-family:garamond; text-align:center;}
                .product_images {text-align:center;}
                .product_links {font-size:24px; font-family:garamond; text-align:center;}
                .about_header {color:white; font-size:30px;}
                .about_text {color:white;}
                

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
                
           

            <div class="search">

                <p>
                    <input style="height:25px; width:220px;" type="text" placeholder="Type to search for flowers, soil, etc...">
                    <button> Search </button>
                </p>

            </div>
            
        </header>

        <hr class="top_hr">

        <div class="top_searches">

                <p> 
                    Top Searches:
                    &emsp;
                    <a href="">Tree Types</a>
                    &emsp;
                    <a href="">Annual Flowers</a>
                    &emsp;
                    <a href="">Sunflowers</a>
                    &emsp;
                    <a href="">Perennial Flowers</a>
                    &emsp;
                    <a href="">Chrysanthemum</a>
                </p>

        </div>

        <div>

                <header class="explore_header"> Explore Plants for Your Home: </header>
                <p class="product_images"> 
                    <a href=""><img src="tomato.jpg" width="200" height="200"></a>
                    &emsp;
                    <a href=""><img src="mandarin.webp" width="200" height="200"></a>
                    &emsp;
                    <a href=""><img src="viola.jpg" width="200" height="200"></a>
                    &emsp;
                    <a href=""><img src="perennial.jpg" width="200" height="200"></a>
                </p>

                <p class="product_links">
                <a href="">Vegetable Plants</a>
                &emsp;
                <a href="">Fruit Plants</a> 
                &emsp;
                <a href="">Annual Flowers</a>
                &emsp;
                <a href="">Perennial Flowers</a>
                </p>

            </div>

            <div>
                <header class="explore_header"> Other Essential Gardening Tools: </header>
                <p class="product_images"> 
                    <a href=""><img src="soil.webp" width="200" height="200"></a>
                    &emsp;
                    <a href=""><img src="container.jpg" width="200" height="200"></a>
                    &emsp;
                    <a href=""><img src="shovel.webp" width="200" height="200"></a>
                    &emsp;
                    <a href=""><img src="plantfood.jpeg" width="200" height="200"></a>
                </p>

                <p class="product_links">
                <a href="">Soil</a>
                &emsp;
                <a href="">Pots</a>
                &emsp;
                <a href="">Gardening Shovels</a>
                &emsp;
                <a href="">Fertilizer</a>
                </p>

            </div>

            <div class = "description">

                <header class="about_header"> <b> About Us: </b> </header>
                <a href=""><img src="plantsflowers.jpg" width="1200" height="400"></a>

                <p class="about_text"> 
                Floral Studio is a unique flower shopping experience, offering both online and in-person browsing. We supply our customers with a vast array of flowers, which allows them to choose the perfect flower for any occasion. As a nursery, we strive to give our customers the best service we can offer, with quality products, easy transportation, and on-time delivery. Our store’s products range from many colorful flowers and vegetable plants to wreaths and trees during the winter months. Additionally, Floral Studio sells gardening supplies, including fertilizers, potting soils, planting pots, and many other tools an avid gardener may need. We offer a pleasant and easy shopping experience for both residential housing customers and landscaping contractors.
                </p>

                <a href="">Learn more about us here.</a>

       		 </div>

             <div class = "signup">

                <p>Stay in the loop by signing up for our mailing list: 

                    <input style="height:40px; width:300px;" type="text" placeholder="Enter your email...">
                    <button> Sign Up! </button>

                </p>
    
            </div>

            <?php

                define("FILE_AUTHOR", "Madeleine Cavanagh, Hunter Conway, William Caras, William Boulton");

                include "footer.php";

            ?>