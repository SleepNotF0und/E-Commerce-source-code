<?php
    include "./connection.php";
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="Gears" />
        <title> Gears </title>
        <link rel="stylesheet" href="./css/Gears.css">
    </head>
    
    <body>
        <div class="bar">
            <a href="./Main_page.php" class="CountryShop"> Country Shop </a>
            <a href="login_page.php" class="login"> <?php if (session_status() != PHP_SESSION_NONE) { echo "Profile"; }  else { echo "LOGIN"; }?> </a>
            <a href="signup_page.php" class="sign_up"> SIGN UP </a>
        </div>

        <span class="call"> +20 440 3151 4250 </span>
        <a href="./Clothes.php" class="Clothes"> Clothes </a>                                            
        <a href="" class="Tools"> Gears </a>                                               
        <a href="" class="about"> About Us </a>                                             <!-- empty -->

        <img src="Images/imag5.jpg" class="main_img" width="100%" height="410px"/>
        <span class="gears"> Gears </span>

        <div class="Catgry_bar2">
            <input type="text" name="search_box" class="search_box" placeholder="Search">
        </div>

        <div class="main_box">
            <?php 
                include 'Gears_item.php';
            ?>
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