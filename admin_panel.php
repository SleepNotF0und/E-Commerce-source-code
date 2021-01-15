<?php
    include "./connection.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Admin Panel </title>
        <link rel="stylesheet" href="./css/admin_panel.css">
    <head>

    <body>
        <div class="red_bar">
            <span class="AdminPanel"> Admin Panel </span>    
        </div> 
        
        <div class="dashboard">
            <span class="dash"> Products <span>
        </div>

        <div class="members">
            <span class="mmm"> Members <span>
        </div>

        <!------------------------------------- MAIN FORM --------------------------------------------->
        <div class="main_form">
            <span class="to_main"> To Main Page </span>
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" name="pro_name" class="pro_name" placeholder="Description" >
                <input type="text" name="pro_price" class="pro_price" placeholder="Price" >
                <input type="test" name="pro_id" class="pro_id" placeholder="id" >
                <input type="file" name='uploader' class="uploader" >
                <button type="submit" name="Upload" class="Upload"> Upload </button>
            </form>
        </div>

        <!------------------------------------- Clothes FORM --------------------------------------------->
        <div class="clothes_form">
            <span class="to_clothes"> To Clothes Page </span>
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" name="pro_name2" class="pro_name" placeholder="Description" >
                <input type="text" name="pro_price2" class="pro_price" placeholder="Price" >
                <input type="test" name="pro_id2" class="pro_id" placeholder="id" >
                <input type="file" name="uploader2" class="uploader" >
                <button type="submit" name="Upload2" class="Upload"> Upload </button>
            </form>
        </div>

        <!------------------------------------- GEARS FORM --------------------------------------------->
        <div class="gears_form">
            <span class="to_gears"> To Gears Page </span>
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" name="pro_name3" class="pro_name" placeholder="Description" >
                <input type="text" name="pro_price3" class="pro_price" placeholder="Price" >
                <input type="test" name="pro_id3" class="pro_id" placeholder="id" >
                <input type="file" name="uploader3" class="uploader" >
                <button type="submit" name="Upload3" class="Upload"> Upload </button>
            </form>
        </div>

        <!------------------------------------- DELETE FORMS --------------------------------------------->
        <div class="delete_main_form">
            <form method="POST" action="" >
                <input type="text" name="delete_id" class="delete_id" placeholder="Main ">
                <button type="submit" name="delete_btn" class="delete_btn" onclick=alert("!! DONE !!");> DELETE </button>
            </form>
        </div>

        <div class="delete_clothes_form">
            <form method="POST" action="" >
                <input type="text" name="delete_id2" class="delete_id" placeholder="Clothes">
                <button type="submit" name="delete_btn2" class="delete_btn" onclick=alert("!! DONE !!");> DELETE </button>
            </form>
        </div>

        <div class="delete_gears_form">
            <form method="POST" action="" >
                <input type="text" name="delete_id3" class="delete_id" placeholder="Gears">
                <button type="submit" name="delete_btn3" class="delete_btn" onclick=alert("!! DONE !!");> DELETE </button>
            </form>
        </div>

        <!------------------------------------------- PAGES ------------------------------------------------>
        <a href="Main_page.php" class="Home"> Home </a>
        <a href="Clothes.php" class="Clothes"> Clothes </a>
        <a href="Gears.php" class="gears"> Gears </a>     

    </body>
</html>

<?php
    
    #Get the Count of product & Set it into the Dashboard   
    $main_count = $connect->query("SELECT COUNT(*) FROM product_images;")->fetch_array();
    $clothes_count = $connect->query("SELECT COUNT(*) FROM clothes_images;")->fetch_array();
    $gears_count = $connect->query("SELECT COUNT(*) FROM gears_images;")->fetch_array();
    $count = $main_count[0] + $clothes_count[0] + $gears_count[0];
    echo "<span class=ftched_count>" .$count. "</span>";

    #====================================================================================================================
    #====================================================================================================================
    
    # ______________________________________
    #|                                      |
    #| Upload To product_images (Main_page) |
    #|______________________________________|

    
    if ( isset($_REQUEST['Upload']) ) {

        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_id = $_POST['pro_id'];

        $pro_img = $_FILES['uploader'];
        $pro_img_name = $_FILES['uploader']['name'];
        $pro_img_temp = $_FILES['uploader']['tmp_name'];

        #Images Allowed Extentions & lower the uploaded Extentions
        $Extentions = array("jpg" , "png" , "jpeg");                    
        $explode = explode( '.' , $pro_img_name );                      
        $imgExtention = strtolower(end($explode));                      
        
        #Check if Extention of uploaded image Allowed
        if ( in_array($imgExtention,$Extentions) ) {                             
            
            #move the uploaded file into the uplaods folder
            move_uploaded_file($pro_img_temp,'uploads\\Main\\' . $pro_img_name);           //<-------------- need modify

            #insert the uploaded images into the Data Base           
            $sql_insert = "INSERT INTO product_images(Images, Names, Prices, Id) VALUES('$pro_img_name', '$pro_name', '$pro_price', '$pro_id');";
            $connect->query($sql_insert);
            
            #get the images,pro_names,.. from the data base
            $sql_select = "SELECT * FROM product_images WHERE Images = ? OR Names = ? OR Prices = ? OR Id = ? ;";
            $stmt = mysqli_stmt_init($connect);
            if ( !mysqli_stmt_prepare($stmt, $sql_select) ) {
                echo "!!! PREPARING ERROR !!!";  
            }
            else {
                mysqli_stmt_bind_param($stmt, "ssss", $pro_img_name, $pro_name, $pro_price, $pro_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $ftch = mysqli_fetch_assoc($result);

                echo "<img class=ftched_img src='uploads/Main/" .$ftch['Images']. "' alt='' />";
                echo "<span class=ftched_pro_name>" .$ftch['Names']. "</span>";
                echo "<span class=ftched_pro_price>" .$ftch['Prices']. "</span>";
                echo "<span class=ftched_pro_id>" .'#'.$ftch['Id']. "</span>";
            }
        }
        else {
            echo " Extention Not Allowed !! ";
        }
    }
    
    #====================================================================================================================
    #====================================================================================================================

    # _________________________________________
    #|                                         |
    #| Upload To clothes_images (Clothes_page) |
    #|_________________________________________|


    if ( isset($_REQUEST['Upload2']) ) {

        $pro_name2 = $_POST['pro_name2'];
        $pro_price2 = $_POST['pro_price2'];
        $pro_id2 = $_POST['pro_id2'];

        $pro_img2 = $_FILES['uploader2'];
        $pro_img_name2 = $_FILES['uploader2']['name'];
        $pro_img_temp2 = $_FILES['uploader2']['tmp_name'];

        #Images Allowed Extentions & lower the uploaded Extentions
        $Extentions2 = array("jpg" , "png" , "jpeg");                    
        $explode2 = explode( '.' , $pro_img_name2 );                      
        $imgExtention2 = strtolower(end($explode2));                      
        
        #Check if Extention of uploaded image Allowed
        if ( in_array($imgExtention2,$Extentions2) ) {                             
            
            #move the uploaded file into the uplaods folder
            move_uploaded_file($pro_img_temp2,'uploads\\Clothes\\' . $pro_img_name2);           //<-------------- need modify

            #insert the uploaded images into the Data Base           
            $sql_insert2 = "INSERT INTO clothes_images(Images, Names, Prices, Id) VALUES('$pro_img_name2', '$pro_name2', '$pro_price2', '$pro_id2');";
            $connect->query($sql_insert2);
            
            #get the images,pro_names,.. from the data base
            $sql_select2 = "SELECT * FROM clothes_images WHERE Images = ? OR Names = ? OR Prices = ? OR Id = ? ;";
            $stmt = mysqli_stmt_init($connect);
            if ( !mysqli_stmt_prepare($stmt, $sql_select2) ) {
                echo "!!! PREPARING ERROR !!!";  
            }
            else {
                mysqli_stmt_bind_param($stmt, "ssss", $pro_img_name2, $pro_name2, $pro_price2, $pro_id2);
                mysqli_stmt_execute($stmt);
                $result2 = mysqli_stmt_get_result($stmt);
                $ftch2 = mysqli_fetch_assoc($result2);

                echo "<img class=ftched_img2 src='uploads/Clothes/" .$ftch2['Images']. "' alt='' />";
                echo "<span class=ftched_pro_name2>" .$ftch2['Names']. "</span>";
                echo "<span class=ftched_pro_price2>" .$ftch2['Prices']. "</span>";
                echo "<span class=ftched_pro_id2>" .'#'.$ftch2['Id']. "</span>";
            }
        }
        else {
            echo " Extention Not Allowed !! ";
        }
    }

    #====================================================================================================================
    #====================================================================================================================

    # _________________________________________
    #|                                         |
    #| Upload To gears_images (gears_page)     |
    #|_________________________________________|


    if ( isset($_REQUEST['Upload3']) ) {

        $pro_name3 = $_POST['pro_name3'];
        $pro_price3 = $_POST['pro_price3'];
        $pro_id3 = $_POST['pro_id3'];

        $pro_img3 = $_FILES['uploader3'];
        $pro_img_name3 = $_FILES['uploader3']['name'];
        $pro_img_temp3 = $_FILES['uploader3']['tmp_name'];

        #Images Allowed Extentions & lower the uploaded Extentions
        $Extentions3 = array("jpg" , "png" , "jpeg");                    
        $explode3 = explode( '.' , $pro_img_name3 );                      
        $imgExtention3 = strtolower(end($explode3));                      
        
        #Check if Extention of uploaded image Allowed
        if ( in_array($imgExtention3,$Extentions3) ) {                             
            
            #move the uploaded file into the uplaods folder
            move_uploaded_file($pro_img_temp3,'uploads\\Gears\\' . $pro_img_name3);          

            #insert the uploaded images into the Data Base           
            $sql_insert3 = "INSERT INTO gears_images(Images, Names, Prices, Id) VALUES('$pro_img_name3', '$pro_name3', '$pro_price3', '$pro_id3');";
            $connect->query($sql_insert3);
            
            #get the images,pro_names,.. from the data base
            $sql_select3 = "SELECT * FROM gears_images WHERE Images = ? OR Names = ? OR Prices = ? OR Id = ? ;";
            $stmt = mysqli_stmt_init($connect);
            if ( !mysqli_stmt_prepare($stmt, $sql_select3) ) {
                echo "!!! PREPARING ERROR !!!";  
            }
            else {
                mysqli_stmt_bind_param($stmt, "ssss", $pro_img_name3, $pro_name3, $pro_price3, $pro_id3);
                mysqli_stmt_execute($stmt);
                $result3 = mysqli_stmt_get_result($stmt);
                $ftch3 = mysqli_fetch_assoc($result3);

                echo "<img class=ftched_img3 src='uploads/Gears/" .$ftch3['Images']. "' alt='' />";
                echo "<span class=ftched_pro_name3>" .$ftch3['Names']. "</span>";
                echo "<span class=ftched_pro_price3>" .$ftch3['Prices']. "</span>";
                echo "<span class=ftched_pro_id3>" .'#'.$ftch3['Id']. "</span>";
            }
        }
        else {
            echo " Extention Not Allowed !! ";
        }
    }

    #===================================================================================================================
    #===================================================================================================================

    #Delete a Product From product_images
    if ( isset($_REQUEST['delete_btn']) ) {

        $delete_id = $_POST['delete_id'];
        $connect->query( "DELETE FROM product_images WHERE Id = $delete_id ;");
    }

    #Delete a Product From clothes_images
    if ( isset($_REQUEST['delete_btn2']) ) {

        $delete_id2 = $_POST['delete_id2'];
        $connect->query( "DELETE FROM clothes_images WHERE Id = $delete_id2 ;");
    }

    #Delete a Product From gears_images
    if ( isset($_REQUEST['delete_btn3']) ) {

        $delete_id3 = $_POST['delete_id3'];
        $connect->query( "DELETE FROM gears_images WHERE Id = $delete_id3 ;");
    }
?>