<?php 
    include './connection.php';

    $sql_select = "SELECT * FROM product_images";
    $result = $connect->query($sql_select);

    if ($result->num_rows > 0 && $result->num_rows <= 20) {
        while($row = $result->fetch_assoc()) {
            echo "<div class=box>";
                echo "<center>"; echo "<img  class=ftched_img src='uploads/Main/" .$row['Images']. "' alt='' />"; echo "</center>";
                echo "<br>";
                echo "<center>"; echo "<span class=ftched_pro_name>".$row['Names']."</span>"; echo "</center>";
                echo "<br>";
                echo "<center>"; echo "<span class=ftched_pro_price>".$row['Prices']."</span>"; echo "</center>";
                echo "<br>";
                echo "<center>"; echo "<a class=buy href=> Buy </a>"; echo "</center>";
            echo "</div>";        
        }
    } 
    elseif ( $result->num_rows > 20 ) {
        echo "<script type='text/javascript'>alert('!! THE PAGE IS FULL PLAESE REFREASH !!');</script>";
        $row = $result->fetch_assoc();
        $ID = $row['Id'];
        $connect->query( "DELETE FROM product_images WHERE Id = $ID ;");
    }
    else {
        echo "No Product in the Data Base";
    }
?>


