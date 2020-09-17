<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="src/js/login.js"></script>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="stylesheet" href="styles/login.css" />
    <link rel="stylesheet" href="styles/index.css" />

    <title>Smart Clinic</title>
</head>

<body>

    <div class="header"  style=" display: flex; margin: 10px; justify-content: center; align-items: center;">

        <img width="400"  src="src/img/heading.png" alt="" />
    
        <div class="icon-container">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        
    </div>

    <div style="display: flex; justify-content: center; align-items: center; height:100%">
        <!-- Member Login part -->
        <section class="login" style="height: 350px;">
            <form id="login-form" action="" method="POST">
                <h1>Admin login</h1>
                <div class="login-control">
                    <img class="icons" src="src/img/USERNAME.svg" alt="" /><input class="username" type="text" name="username" placeholder="username" maxlength="20" />
                </div>
                <div class="login-control">
                    <img class="icons" src="src/img/lock.svg" alt="" />
                    <input id="password_cus" class="password" type="password" name="password" placeholder="password" maxlength="20" /><i id="passwordIc" class="fas fa-eye-slash passwordIcon"></i>
                </div>

                <p style="text-transform: none; margin: 20px;">
                    <i id="full" class="far fa-check-square"></i><label class="noselect" for="rememberMe">
                        <i style="display:none;" id="emp" class="far fa-square"></i>
                        Remember me</label>
                </p>
                <input name="loginForm" type="submit" value="Login" />
            </form>
        </section>   
    </div>
</body>

</html>