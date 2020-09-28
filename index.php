<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';

$user = new User;
$clinic = new ClinicDB;
$doc = new Staff;
if ($user->loggedIn()) {
    Redirect::to('dashboard(PAGE).php');
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
    <link rel="stylesheet" href="styles/register.css" />
    <link rel="stylesheet" href="styles/index.css" />
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <script src="src/js/i18n/datepicker.en.js"></script>
    <title>Smart Clinic <?php if ($user->loggedIn()) echo deescape($clinic->getClinicInfo('clinicName', 'clinicID', $user->data()->clinicID));
                        else echo " Log in to show clinic" ?></title>
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
        <section class="login">
            <form id="login-form" action="" method="POST">
                <h1>Member login</h1>
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
                <div class="footer">
                    <div id="error" style="color: red;"></div>
                    <p>
                        Forgot password?
                        <a href="#" id="forgotPassword" onclick="toggleView('.login','.fpcontainer')">Click here!</a>
                    </p>
                    <p>
                        Don't have an account?
                        <a href="#" id="register" onclick="toggleView('.login','.register-container')">Click here!</a>
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
                    if (username.value != "" && password.value != "") {
                        form.submit();
                    } else {
                        error.innerHTML = 'Please fill in all blanks';
                    }
            })
        </script>
        <?php
                }
                if (isset($_GET['e'])) {
                    $error = $_GET['e'];
                    switch ($error) {
                        case 'e':
                            echo $_GET['e'];
        ?>
                <script>
                    const heading = document.querySelector('.header');
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
    <section class="fpcontainer" >
        <form method="POST">
            <a href="#" onclick="toggleView('.fpcontainer','.login','flex')"><i class="fas fa-times-circle" style="color: #444242; font-size: 30px;"></i></a>
            <img src="src/img/lock2.png" width="100" height="100"  />
            <h2 >FORGOT PASSWORD?</h2>
            <p style="font-size: 14px;" >
                Please enter your registered email address to recover your password.
                <br />You will receive an email with instructions.
            </p>
            <div>
                <i class="fa fa-envelope email-icon" aria-hidden="true"></i>
                <input class="email" type="text" name="email" placeholder="" />
            </div>
            <button class="reset" type="submit">RESET</button>
        </form>
    </section>

    <!-- Registration part -->
    <div class="register-container">
        <a href="#" onclick="toggleView('.register-container','.login','flex')">
            <i class="fas fa-times-circle" style="color: #444242; font-size: 30px; position: absolute; right:20px"></i>
        </a>

        <div class="title">
               <h1>REGISTRATION</h1> 

        </div>
    <!-- Modidied for registration integration, by Yash -->

        <form id="registerForm" method="post">

            <div class="form-inputs" >

                    <div>
                        <label for="clinic-name" >Clinic ID</label>
                        <select name="clinic" name="clinic-name" id="clinic-name">
                            <?php 
                            $clinicDB = new ClinicDB;
                            $data = $clinicDB->getAllAbbreviations();
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="title">Title</label>
                        <select id="title-name" name="title">
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                        </select>
                    </div>

                    <div>
                        <label for="first-name"  class="col1-label">
                            First Name
                        </label>
                        <input type="text" name="firstName" value="<?php echo Input::get('firstName') ?>"  id="first-name">
                    </div>

                    <div>
                        <label  for="last-name" class="col1-label">
                            Last Name
                        </label>
                        <input type="text" name="lastName"  value="<?php echo Input::get('lastName') ?>"  id="last-name">
                    </div>

                    <div>
                        <label for="mobile" class="col1-label">Mobile Number</label>
                        <input  style="width: 150px;" type="tel" id="mobile"name="mobileNumber" value="<?php echo Input::get('mobileNumber') ?>" >
                    </div>

                    <div>
                        <label for="email-address" class="col1-label">Email</label>
                        <input type="email" id="email-address" name="email" value="<?php echo Input::get('email') ?>" >
                    </div>
                    
            </div>


            <div  class="form-inputs">
                    
                <div>
                    <label for="gender" >Gender</label>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">female</option>
                        <option value="Unspecified">Unspecified</option>
                    </select>
                </div>

                <div>
                    <label for="birth-date">Birth Date</label>
                    <input  style="width: 150px;"  type="text" id="birth-date" class="datepicker-here" data-language='en'  name="birthdate" value="<?php echo Input::get('birthdate') ?>" autocomplete="off">
                </div>

                <div>
                    <label for="user-name">User Name</label>
                    <input type="text" id="user-name"  name="username" value="<?php echo Input::get('username') ?>" autocomplete="off">
                </div>

                <div>
                    <label for="pass-word" >Password</label>
                    <input type="password" id="pass-word" name="password" autocomplete="off">
                </div>
                
                <div>
                    <label for="confirn-pass-word" >Confirm Password</label>
                    <input type="password" id="confirm-pass-word" name="passwordConf" autocomplete="off">
                </div>

            </div>

            <div class="submit-btn">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <input name="register" type="submit" value="SUBMIT" />
            </div>
            <div id="register-error" style="color: red;"></div>
        </form>
        <?php
            if (isset($_POST)) {
        ?>
        <script>
            let form = document.getElementById("registerForm");
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                form.action = "<?php echo 'byCMkGnmDa3mXlyfgPh/registration_module/register.php' ?>";
                form.submit();
            });
        </script>
        <?php
            }
        ?>
    <!-- Modidied for registration integration, by Yash -->
    </div>
    </div>
    <script>
            const formRegister = document.getElementById("registerForm");
            const clinicName = document.getElementById("clinic-name");
            const title = document.getElementById("title-name");
            const firstName = document.getElementById("first-name");
            const lastName = document.getElementById("last-name");
            const mobile = document.getElementById("mobile");
            const emailAddress = document.getElementById("email-address");
            const gender = document.getElementById("gender");
            const birth = document.getElementById("birth-date");
            const userName = document.getElementById("user-name");
            const passWord = document.getElementById("pass-word");
            const passwordConf = document.getElementById("confirm-pass-word")
            const registerationError = document.getElementById("register-error");
            formRegister.addEventListener('submit', (e) => {
                <?php
                if (isset($_POST)) {
                ?>
                    e.preventDefault();
                    formRegister.action = "<?php echo '/smartClinicSystem/byCMkGnmDa3mXlyfgPh/registration_module/register.php' ?>";
                    if (clinicName.value != "" 
                    && title.value != "" 
                    && firstName.value != "" 
                    && lastName.value != ""
                    && mobile.value != "" 
                    && emailAddress.value != ""
                    && gender.value != ""
                    && birth.value != ""
                    && userName.value != ""
                    && passWord.value != ""
                    && passwordConf.value == passWord.value
                    ) {
                        formRegister.submit();
                    } else {
                        registerationError.innerHTML = 'Please fill in all blanks';
                    }
            })
        </script>
        <?php
                }
                if (isset($_GET['rg'])) {
                    $error = $_GET['rg'];
                    switch ($error) {
                        case 'success':
        ?>
                    <!-- Do the registration successful message -->
    <?php
                            break;
                            case 'fail':
                                ?>
                <script>
                    const error = document.getElementById('error');
                    error.innerHTML = 'Something went wrong with the registration. Please contact us';
                </script>
                                <?php
                                break;
                        }
                }
    ?>
    
    <script>
        function focusfunction() {
            document.getElementById("birth-date").focus();
        }

        function toggleView(hide,show,display='block'){
            document.querySelector(hide).style.display = 'none'
            document.querySelector(show).style.display = display
        }

    </script>
</body>

</html>