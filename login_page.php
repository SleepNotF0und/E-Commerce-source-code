<?php
    include 'connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title> Login </title>
        <link rel="stylesheet" href="./css/login_page.css">
    </head>

    <body>
        <span class="login_box"></span>
        <span class="bar">LOGIN</span>
        <a href="" class="forget">Forget your Passowrd ?</a>
        <form name="login_form" action="" method="POST">
            <input type="text" name="username" placeholder="Username" class="username" required="required">
            <input type="password" name="password" placeholder="Password" class="password" required="required">
            <button type="submit" name="login" class="login"> LOGIN </button>
        </form>
    </body>
</html>

<?php   
    if ( isset($_REQUEST['login']) ) {

        $post_username = $_POST['username'];
        $post_password = $_POST['password'];

        $sql = "SELECT Usernames,Passwords FROM accounts";
        $query = $connect->query($sql);

        if ($query->num_rows > 0) {
            // output data of each row
            while($result = $query->fetch_assoc()) {
                if ( $post_username == $result['Usernames'] && $post_password == $result['Passwords'] ) {
                    header("Location: http://localhost/my_pages/Country_Shop/profile_page.php");
                }
                else {
                    echo "<span class=error>!!! ACCESS DENIDED !!!</span>";
                }
            }
        }
    }
?>