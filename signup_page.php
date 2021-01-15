<?php
    include 'connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>SIGN UP</title>
        <link rel="stylesheet" href="./css/signup_page.css">
    </head>
    
    <body>
        <span class="sign_box"></span>
        <span class="bar">SIGN UP</span>

        <div id="error" class="error"></div>
        <form name="sign_up_form" action="" id="sign_up_form" method="POST">
            <input type="text" placeholder="Username" name="username_sgn" class="username_sgn" id="username_sgn" required>
            <input type="email" placeholder="email" name="email" class="email" id="email" required="required">
            <input type="password" placeholder="Password" name="password_sgn" class="password_sgn" id="password_sgn" required>
            <input type="password" placeholder="Confirm Password" name="confirm_password_sgn" class="confirm_password_sgn" id="password_sgn2" required>
            <input type="submit" name="sign_up" class="sign_up" value="SIGN UP">
        </form>   

        <script>
            const form = document.getElementById("sign_up_form");
            const submit = document.getElementById("submit");
            const chk_usrname = document.getElementById("username_sgn");
            const chk_email = document.getElementById("email");
            const chk_pass = document.getElementById("password_sgn");
            const chk_pass2 = document.getElementById("password_sgn2");
            const errorElement = document.getElementById('error');

            form.addEventListener('submit', (event) => {                          //prevent the default of the event 'submit'  
                let messages = [];

                if (chk_usrname.value === '' || chk_usrname.value == null) {
                    event.preventDefault();
                    messages.push("you must Enter a username");
                    errorElement.innerText = messages.join(', ');    
                }

                if (chk_usrname.value.Length > 20 ) {
                    event.preventDefault();
                    messages.push("Username is too Long");
                    errorElement.innerText = messages.join(', ');
                }

                if (chk_usrname.value.Length < 7) {
                    event.preventDefault();
                    messages.push("Username is too small");
                    errorElement.innerText = messages.join(', ');
                }

                if (chk_email.value === '' || chk_email.value == null) {
                    event.preventDefault();
                    messages.push("You must Enter an Email");
                    errorElement.innerText = messages.join(', ');    
                }

                if (chk_email.value.Length > 30 ) {
                    event.preventDefault();
                    messages.psuh("Email Length too Long");
                    errorElement.innerText = messages.join(', ');
                }

                if (chk_email.value.Length < 7) {
                    event.preventDefault();
                    messages.push("Email Length is too small");
                    errorElement.innerText = messages.join(', ');
                }

                if (chk_pass.value.Length > 30 ) {
                    event.preventDefault();
                    messages.push("Password Length is too Long");
                    errorElement.innerText = messages.join(', ');
                }

                if (chk_pass.value !== chk_pass2.value) {
                    event.preventDefault();
                    messages.push("Password Not identical");
                    errorElement.innerText = messages.join(', ');
                }   })
        </script>
    </body>
</html>

<?php
    if ( isset($_REQUEST['sign_up']) ) {

        session_start();
        
        $ftch_username = $_POST['username_sgn'];    
        $ftch_email = $_POST['email'];
        $ftch_password = $_POST['password_sgn'];

        $_SESSION['username'] = $ftch_username;
        $_SESSION['email'] = $ftch_email;
        $_SESSION['password'] = $ftch_password;

        $insert = "INSERT INTO accounts(Usernames,Passwords,Emails) VALUES('$ftch_username','$ftch_password','$ftch_email');";
                    
        if ($connect->query($insert) === TRUE)
        {
            header("Location: http://localhost/my_pages/Country_Shop/profile_page.php");
        } 
        else
        {
            echo "Error: " . $insert . "<br>" . $connect->error;
        }
        $connect->close();
    }    
?>