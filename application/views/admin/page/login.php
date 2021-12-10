    <!DOCTYPE html>
    <html lang="en">

    <!-- Dashboard taken from Bootstrap_Metro_Dashboard - https://linghucong.js.org/Bootstrap_Metro_Dashboard/index.html-->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" type="text/css" href="http://localhost/shoppinghub/assets/css/bootstrap.min.css">
        <script src="http://localhost/shoppinghub/assets/css/bootstrap.css"></script>
    </head>

    <body class="bg-img">
        <div class="container">
            <form id="adminlogincheck" class="form-horizontal text-center"
                action="<?php echo base_url('adminlogin/admin_login_check'); ?>" method="post">

                <h2 class="text-center" style="color: blue"><b> Admin Login</b></h2><br>
                <div class="input-prepend">
                    <input class="input-large span10" value="<?php set_value('user_name'); ?>" name="user_email"
                        id="user_email" type="text" placeholder="Email" required />
                </div><br>

                <div class="input-prepend" title="User Password">
                    <input class="input-large" name="user_password" id="user_password" type="password"
                        placeholder="Password" required />
                </div><br>


                <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember
                    me</label><br><br>
                <div class="login-btn">
                    <input type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </body>

    <style>
body,
html {
    height: 100%;
}

.bg-img {
    background-image: url('<?php echo base_url("assets/img/login_bg.jpg"); ?>');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    position: relative;
}

.container {
    opacity: 60%;
}

form {
    padding: 5px;
    width: 40%;
    min-width: 50px;
    max-width: 300px;
    background: #fff;
    position: absolute;
    top: 20%;
    left: 20%;
    border-style: solid;
}

/* #adminlogincheck{

} */
    </style>

    </html>