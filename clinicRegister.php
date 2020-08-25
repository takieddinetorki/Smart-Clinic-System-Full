<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>

    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="stylesheet" href="styles/register2.css" />
    <link rel="stylesheet" href="styles/index.css" />
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <script src="src/js/i18n/datepicker.en.js"></script>
    <title>Smart Clinic </title>
</head>

<body>

    <div class="header" style=" display: flex; margin: 10px; justify-content: center; align-items: center;">

        <img width="400" src="src/img/heading.png" alt="" />

        <div class="icon-container">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>

    </div>
    <div style="overflow-x: auto;margin: 20px;">
        <!-- Registration part -->
        <div class="register-container">

            <form id="registerForm" action="" method="post">
                <div style="display: block;background: rgba(255, 255, 255, 0.4);border-radius: 50px;padding:20px">
                    <a href="#">
                        <i class="fas fa-times-circle" style="color: #444242; font-size: 30px; position: absolute; right:50px"></i>
                    </a>

                    <div class="title">
                        <h1>CLINIC REGISTRATION</h1>
                    </div>
                    <div>
                        <label for="clinic1">Company Name</label>
                        <input type="text" id="clinic1">
                    </div>
                    <div>
                        <label for="clinic2"></label>
                        <input type="text" id="clinic2">
                    </div>
                    <div>
                        <div style="margin:0">
                            <label for="Company" style="width: 68%;">Company No</label>
                            <input type="text" id="Company">
                        </div>
                        <div style="margin:0">
                            <label for="bank" style="width: 48%;padding-left: 30px;">Bank Account No</label>
                            <input type="text" id="bank" style="width: 42%;">
                        </div>
                    </div>
                    <div>
                        <div style="margin:0">
                            <label for="Company" style="width: 68%;">Sales Tax Register No</label>
                            <input type="text" id="Company">
                        </div>
                        <div style="margin:0">
                            <label for="bank" style="width: 47%;padding-left: 30px;">GST Register No</label>
                            <input type="text" id="bank" style="width: 44%;">
                        </div>
                    </div>
                    <div>
                        <label for="address1">Address</label>
                        <input type="text" id="address1">
                    </div>
                    <div>
                        <label for="address2"></label>
                        <input type="text" id="address2">
                    </div>

                </div>
                <div style="text-align:center;margin:0">
                    <p style="width:100%">By creating a Clinic Account, you agree to our <a href="#">Terms</a> and <a href="#">Services</a></p>
                </div>
                <div class="submit-btn">
                    <input name="register" type="submit" value="SUBMIT" />
                </div>

            </form>

        </div>
    </div>
    <script>


    </script>
</body>

</html>