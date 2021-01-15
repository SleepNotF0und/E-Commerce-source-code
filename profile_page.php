<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Profile</title>
        <style>
            body {
                margin:0px; padding:0px;
            }

            div.red_bar {
                position:absolute;  
                width:100%; height:50px;
                background-color:rgba(255, 0, 0, 0.918);                 
            }

            span.CountryShop {
                position:absolute; top:1px; left:30px;
                font-family:sans-serif; font-weight:bold; font-size:40px; color: white;
            }

            span.hello {
                position:absolute; top:100px; left:330px;
                color: #444; font-size:20px; font-weight:bold; font-family:sans-serif;
            }
            
            span.welcome {
                position:absolute; top:140px; left:330px;
                color: gray; font-size:15px; font-weight:bold; font-family:sans-serif;
            }

            div.info_form {
                position:absolute; top:250px; left:300px;
                width:900px; height:250px; 
                border-style:solid; border-width:2px; border-color:rgba(230, 230, 230, 0.945);
                background-color:white;
                border-radius:30px;
            }

            span.info {
                position:absolute; padding:20px 0px 0px 30px;
                color: #444; font-size:16px; font-weight:bold; font-family:sans-serif;
            }

            span.email {
                position:absolute; padding:100px 0px 0px 30px;
                color: #444; font-size:14px; font-weight:bold; font-family:sans-serif;
            }

            span.pass {
                position:absolute; padding:140px 0px 0px 30px;
                color: #444; font-size:14px; font-weight:bold; font-family:sans-serif;
            }

            span.pay_method {
                position:absolute; padding:180px 0px 0px 30px;
                color: #444; font-size:14px; font-weight:bold; font-family:sans-serif;
            }
            
            a.Home {
                position:absolute; top:100px; left:0px;
                color:white; font-size:30px; font-weight:bold; font-family:sans-serif;
                text-decoration:none;
                background-color:red; padding:12px 50px 12px 50px;
            }

            a.payment {
                position:absolute; top:170px; left:0px;
                color:white; font-size:25px; font-weight:bold; font-family:sans-serif;
                text-decoration:none;
                background-color:red; padding:15px 30px 15px 50px;
            }

            a.logout {
                position:absolute; top:240px; left:0px;
                color:white; font-size:25px; font-weight:bold; font-family:sans-serif;
                text-decoration:none;
                background-color:red; padding:12px 20px 12px 50px;
            }

        </style>
    </head>

    <body>
        <div class="red_bar">
            <span class="CountryShop"> Country Shop </span>
        </div>
        <span class="hello"> HELLO, <?php session_start(); if( isset($_SESSION['username']) && $_SESSION['username'] != null ) { echo $_SESSION['username']; } else{ echo "Empty"; } ?> </span>   
        <span class="welcome"> Welcome to Country Shop We offer you best Gears for best Prices !! <br> Delivery is Free !! Enjoy :) </span>
        <a href="Main_page.php" class="Home"> Home </a>
        <a href="" class="payment"> Payment </a>
        <a href="logout.php" class="logout"> LOG OUT </a> 

        <div class="info_form">
            <span class="info"> ACCOUNT INFORMATION </span>
            <span class="email"> EMAIL : <?php  if( isset($_SESSION['email']) && $_SESSION['email'] != null) { echo $_SESSION['email']; } else { echo "Empty"; }  ?> </span>
            <span class="pass"> PASSWORD : <?php  if( isset($_SESSION['password'])  && $_SESSION['password'] != null) { echo $_SESSION['password']; } else { echo "Empty"; }  ?> </span>
            <span class="pay_method"> PAYMENT METHOD :  </span>
        </div>    
    </body>
</html>