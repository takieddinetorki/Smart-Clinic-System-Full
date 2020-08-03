<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';

$user = new User;
$clinic = new ClinicDB;
$doc = new Staff;
if($user->loggedIn())
{
    Redirect::to('dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="icon" href="src/img/doctor.ico" />
    <script src="https://use.fontawesome.com/1cdb6c68ea.js"></script>
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="src/js/login.js"></script>
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="stylesheet" href="styles/login.css" />
    <link rel="stylesheet" href="styles/forgotpassword.css" />
    <link rel="stylesheet" href="styles/animations.css" />
    <link rel="stylesheet" href="styles/register.css" />
    <link rel="stylesheet" href="styles/index.css" />
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <script src="src/js/i18n/datepicker.en.js"></script>
    <title>Smart Clinic <?php if($user->loggedIn()) echo deescape($clinic->getClinicInfo('clinicName','clinicID',$user->data()->clinicID)); else echo " Log in to show clinic"?></title>
</head>

<body>
    <nav>
        <div class="fb">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
        </div>
        <div class="inst">
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="twit">
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </nav>

    <header class="heading">
        <img width="600" src="src/img/heading.png" alt="" />
    </header>
    <div>
        <!-- Member Login part -->
        <section class="login">
            <form id="login-form" action="" method="POST">
                <h1>Member login</h1>
                <div class="login-control">
                    <img class="icons" src="src/img/USERNAME.svg" alt="" /><input class="username" type="text"
                        name="username" placeholder="username" maxlength="20" />
                </div>
                <div class="login-control">
                    <img class="icons" src="src/img/lock.svg" alt="" />
                    <input id="password_cus" class="password" type="password" name="password" placeholder="password"
                        maxlength="20" /><i id="passwordIc" class="fas fa-eye-slash passwordIcon"></i>
                </div>

                <p style="text-transform: none; margin: 20px;">
                    <i id="full" class="far fa-check-square"></i><label class="noselect" for="rememberMe">
                        <i style="display:none;" id="emp" class="far fa-square"></i>
                        Remember me</label>
                </p>
                <input name="loginForm" type="submit" value="Login" />
                <div class="footer">
                <div id="error" style="color: red;"></div>
                    <p>
                        Forgot password?
                        <a href="# " id="forgotPassword">Click here!</a>
                    </p>
                    <p>
                        Don't have an account?
                        <a href="#" id="register">Click here!</a>
                    </p>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            </form>
        </section>
        <script>
            const form = document.getElementById("login-form");
            const username = document.getElementsByName("username")[0];
            const password = document.getElementById("password_cus");
            form.addEventListener('submit', (e) => {
                <?php
                if (isset($_POST)) {
                ?>
                e.preventDefault();
                form.action = "<?php echo '/smartClinicSystem/byCMkGnmDa3mXlyfgPh/login_module/login.php' ?>";
                if (username.value != "" && password.value != "")
                {
                   form.submit();
                }else {
                    error.innerHTML = 'Please fill in all blanks';
                }
            })
        </script>
        <?php
        }
            if ($_GET) {
                $error = $_GET['e'];
                switch ($error) {
                    case 'lf':
                        ?>
                        <script>
                            const heading = document.querySelector('.heading');
                            const login = document.querySelector('.login'); 
                            const error = document.getElementById('error');
                            heading.classList.add("header-animate");
                            login.classList.add('show');
                            error.innerHTML = 'Wrong username or password';
                        </script>
                    <?php
                    break;
                }
            }
            ?>
        <!-- Forgot Password part -->
        <section class="fpcontainer">
            <form method="POST">
                <img src="src/img/lock2.png" width="100" height="100" style="margin-top: 0px;" />
                <a href="#" style="margin-right: 66px;float:right"><i class="fas fa-times-circle cancel"
                        style="color: #444242;"></i></a>
                <h2 style="margin-top: -25px;">FORGOT PASSWORD?</h2>
                <p style="font-size: 13px;">
                    Please enter your registered email address to recover your password.
                    <br />You will receive an email with instructions.
                </p>
                <div>
                    <!-- <img class="email-icon" src="src/img/email.svg" alt="" /> -->
                    <i class="fa fa-envelope email-icon" aria-hidden="true"></i>
                    <input class="email" type="text" name="email" placeholder="" />
                </div>
                <button class="reset" type="submit">RESET</button>
            </form>
        </section>

    <!-- Registration part -->
    
        <section class="rgform">
            <form id="registerForm" class="grid-container" action="" method="post">
                <div id="reg">
                    <div id="regist">
                        <!--<div id="cl-button">
                        <a href="#"><i class="fas fa-times-circle" style="font-size:30px;color:rgb(66, 65, 65);"></i></a>
                    </div>-->
                        <h1>REGISTRATION</h1>
                        <div class="form-grid">
                            <div class="form-type col1">
                                <ul class="flex-outer">
                                    <li>
                                        <label for="title" class="col1-label">
                                            Title
                                        </label>
                                        <select id="title-name">
                                            <option value="mr">Mr</option>
                                            <option value="mrs">Mrs</option>
                                        </select>
                                    </li>
                                    <li>
                                        <label for="first-name" class="col1-label">
                                            First Name
                                        </label>
                                        <input type="text" id="first-name">
                                    </li>
                                    <li>
                                        <label for="last-name" class="col1-label">
                                            Last Name
                                        </label>
                                        <input type="text" id="last-name">
                                    </li>
                                    <li>
                                        <label for="mobile" class="col1-label">Mobile Number</label>
                                        <input type="tel" id="mobile">
                                    </li>
                                    <li>
                                        <label for="email-address" class="col1-label">Email</label>
                                        <input type="email" id="email-address">
                                    </li>

                                </ul>

                            </div>
                            <div class="form-type col2">
                                <ul class="flex-outer">
                                    <li>
                                        <label for="gender" class="col2-label">
                                            Gender
                                        </label>
                                        <select id="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </li>
                                    <li>
                                        <label for="birth-date" class="col2-label">
                                            Birth Date
                                        </label>
                                        <input type="date" id="birth-date">
                                        <!-- <a onclick="focusfunction()"><i id="dateicon" style="color: #716E6D;"
                                            class="far fa-calendar-alt" aria-hidden="true"></i></a> -->
                                    </li>
                                    <li>
                                        <label for="user-name" class="col2-label">
                                            User Name
                                        </label>
                                        <input type="text" id="user-name">
                                    </li>
                                    <li>
                                        <label for="pass-word" class="col2-label">Password</label>
                                        <input type="password" id="pass-word">
                                    </li>
                                    <li>
                                        <label for="confirn-pass-word" class="col2-label">Confirm<br>Password</label>
                                        <input type="password" id="confirm-pass-word">
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <input id="inreg" name="register" type="submit" value="SUBMIT" />
                    </div>
                </div>
            </form>
            
        </section>
    </div>
    <script src="src/js/animation.js"></script>
    <script>
        function focusfunction() {
            document.getElementById("birth-date").focus();
        }
    </script>
</body>

</html>