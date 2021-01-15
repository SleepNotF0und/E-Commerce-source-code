<?php
    include "./connection.php";
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="Country Shop" content="Special Gears Makes a 50% Of Your Adventure!!"/>
        <title>Country Shop</title>
        <link rel="stylesheet" href="./css/main_page.css">
    </head>
    
    <body>
        <span class="call"> +20 440 3151 4250 </span>
        <a href="./Clothes.php" class="Clothes"> Clothes </a>                                 <!-- empty -->
        <a href="./Gears.php" class="Tools"> Gears </a>                                                <!-- empty -->
        <a href="" class="about"> About Us </a>                                             <!-- empty -->

        <img src="Images/imag3.jpg" class="main_img" width="100%" height="auto"/>
        <img src="Images/imag4new.png" class="logo" width="215px" height="150px"/>       
        <span class="Hiking"> Hiking </span>
        <span class="Gears"> Gears & </span>
        <span class="Gears2"> Clothes </span>

        <div class="bar">
            <span class="CountryShop"> Country Shop </span>
            <a href="login_page.php" class="login"> <?php if (session_status() != PHP_SESSION_NONE) { echo "Profile"; }  else { echo "LOGIN"; }?> </a>
            <a href="signup_page.php" class="sign_up"> SIGN UP </a>
        </div>

        <div class="Catgry_bar">
            <input type="text" name="search_box" class="search_box" placeholder="Search">
            <a href="./Clothes.php" class="Clothes2"> Clothes </a>
            <a href="./Clothes.php" class="Tools2"> Gears </a>
        </div>                                                          

        <div class="main_box">
            <?php 
                include './main_items.php';
            ?>
        </div>
        
        <div class="essentials">
            <img src="Images/imag6.jpg" class="imag6" width="500px" height="600px"/>

            <ol class="list">
                <li> BACKPACKS </li>
                <li> HIKING MAP </li>
                <li> HIKING GPS DEVICE </li>
                <li> HIKING NAVIGATION COMPASS </li>
                <li> SMALL UTILITY KNIFE </li>
                <li> SMALL HIKING FIRST AID KIT </li>
                <li> WATERPROOF FIRE STARTER </li>
                <li> DURABLE WATER BOTTLE </li>
                <li> EMERGENCY WATER FILTER </li>
                <li> FOOD AND SNACKS </li>
                <li> RAIN PACK COVER </li>
                <li> HEADLAMP </li>
                <li> PORTABLE CHARGER </li>
                <li> SLEEPING BAG</li>
                <li> HIKING TENT </li>
            </ol>
        </div>

        <div class="footer">
            <span class="del_free"> Free delivery from $500 </span>
            <span class="return"> 10-Days Return policy </span>
            <span class="warranty"> 1-Year warranty </span>

            <div class=Email_box>
                <a href="" class="email"> EMAIL US! </a>
                <span class="email_para"> Countact us and we will answer </span>
            </div>

            <div class="phone_box">
                <span class="phone"> +20 440 3151 4250 </span>
                <span class="phone_para"> We are here for you Mon-Fri 10:00-17:00. At other times you'll find us in the mountains!  </span>
            </div>

            <div class=location_box>
                <span class="location"> OUR LOCATION </span>
                <span class="location_para"> Australia, Sydney </span>
            </div>

            <span class="customer"> Customer Service </span>
            <a href="" class="cntct"> Contact Us </span>
            <a href="" class="rtrns"> Returns </span>
            <a href="" class="pymnt"> Payment </span>
        </div>

    </body>
</html>
