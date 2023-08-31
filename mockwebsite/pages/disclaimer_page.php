<!DOCTYPE html>
<!--    disclaimer_page.php
    11/15/2022 Team 1 Original Program
    -->

    <html lang="en">
    	<head>
            <title> Floral Studio Disclaimer Page </title>
            <meta charset="utf-8">

            <style>

                body {background-color:#eedbcd;}
                p {font-family:garamond}
                h2 {font-family:garamond; text-align:center;}
                ul {font-family:garamond;}
                .services_table {margin-left:auto; margin-right:auto;}
                .top_hr {background-color:#185c4f; height:6px; position:relative;}
                .divider {background-color:#185c4f; height:2px;}
                .page_links {font-size:30px; font-family:garamond}
                .logo {position:relative; top:10px;}
                .buttons {position:absolute; right:0px;}
                
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

            <hr class="top_hr">

            <h2> Acceptance of our Terms </h2>
            <p>
                By visiting this website and using our services, you agree to be bound to the terms of this disclaimer. If you do not wish to be bound by these terms, you must cease all use of this website and its related services. 
            </p>

            <hr class="divider">

            <h2> Provision of Services </h2>
            <p>
                By continuing to use this website you agree that Floral Studio. is entitled to modify, discontinue, or otherwise change any of the services that are offered without prior notice. This includes, but is not limited to:
                <table class="services_table">
                    <tr>
                        <td>
                            <ul>
                                <li> All products that are currently being sold, have been sold, or will be sold. </li>
                                <li> All information on our website regarding the care of certain products (e.g., flowers). </li>
                                <li> Features or benefits provided by your user account. </li> 
                                <li> All coupon codes. </li>
                                <li> The terms of this disclaimer. </li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </p>

            <hr class="divider">

            <h2> Copyright Policy </h2>
             <p>
                This website www.floralstudio.com is copyright (C) 2022 by Floral Studio. The material provided on this website may not be copied or altered in any way without prior permission from the website owners. All images provided on this website are copyright property of Floral Studio Any misappropriation of content found on this website is not allowed and legal action can and will be taken if we find that some person(s) have violated this policy.
                <br>
                All Rights Reserved.
             </p>

             <hr class="divider">

             <h2> Sample Photograph Policy </h2>
             <p>
                The photos shown on this website in regards to certain flower arrangements are samples. These samples may appear different than the final product you receive. Certain floral products, such as arrangements, may have flowers of different types or colors based on what is currently available. 
             </p>

             <hr class="divider">

             <h2> Return Policy </h2>
             <p>
                Any products that are bought from this website can be returned within 48 hours of their original purchase. If more than 48 hours have passed, the returned item will not be accepted and no refund will be given. Refunds will be given in the form of in store credit or a different product that is of equal value to the one you returned. Products that were bought with a discount will only have a refund issued to the amount that was initially charged. 
             </p>
            
             <hr class="divider">
             <h2> Delivery Policy </h2>
             <p>
                Products purchased from the Floral Studio website are eligible for delivery if the delivery address is within 20 miles of our main store location in Poughkeepsie, New York. If you are outside of the 20 mile range, your product must be picked up within seven days of purchase. If your product is not picked up within those seven days, you will no longer be able to receive your product and no refunds will be issued. Products can only be picked up during our designated store hours.
             </p>

             <hr class="divider">
             <h2> Proper Product Care </h2>
             <p>
                Proper product care is outlined in the description of the product. Care for any products purchased is the responsibility of the customer. Floral Studio cannot be held liable for any damage or other mistreatment that occurs as a result of not following proper care instructions after the product was given to the customer. 
             </p>

            <?php

                define("FILE_AUTHOR", "William Caras");
                include "footer.php";

            ?>

        </body>

    </html>
