<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/modals.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>

</head>

<body class="table-wrapper-scroll-y">
    <div class="container" id="container">
        <div class="header">
            <img class="logo" src="src/img/heading.png" alt="ClinicCareLogo" />

            <div class="date-time">
                <p id="date">May 2, 2020</p>
                <p id="time">20:05</p>
            </div>

            <div class="search-bar">
                <div class="dropdown-box">
                    <input type="text" name="search" autocomplete="off" />
                    <a href="#" class="searching-button"><img class="nav-icon" src="src/img/magnify-glass.svg"
                            alt="" /></a>

                    <div class="searchbar-dropdown">
                        <input type="radio" id="search-by-id" name="src" />
                        <label for="search-by-id">Search by ID</label>
                        <br />
                        <br />
                        <input type="radio" id="search-by-name" name="src" />
                        <label for="search-by-name">Search by Name</label>
                    </div>
                </div>
            </div>

            <div class="nav-images">
                <a href="#" class="nav-logos"><img src="src/img/settings.png" alt="" /></a>

                <div class="dropdown-notification">
                    <a href="#" class="nav-logos"><img src="src/img/notification.png" alt="" /></a>
                    <div class="dropdown-content">
                        <a href="#">You have missed an appointment</a>
                        <a href="#">Clear all notification</a>
                    </div>
                </div>

                <div class="dropdown-user">
                    <a href="# " class="nav-logos"><img src="src/img/user.png " alt=" " /></a>
                    <div class="dropdown-content2">
                        <a href="#">My Profile</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'sidebar.php';?>

        <div class="main">
            <div>
                <div class="flex" style="flex-wrap: wrap;">
                    <button class="btn" onclick="show('modal1')">Print Modal</button>
                    <button class="btn" onclick="show('modal4')">Print Modal 2</button>
                    <button class="btn" onclick="show('modal5')">Print Modal 3</button>
                    <button class="btn" onclick="show('modal6')">Print Modal 4</button>
                    <button class="btn" onclick="show('modal8')">Print Modal 5</button>
                    <button class="btn" onclick="show('modal9')">Print Modal 6</button>
                    <button class="btn" onclick="show('modal11')">Print Modal 7</button>
                    <button class="btn" onclick="show('modal12')">Print Modal 8</button>
                    <button class="btn" onclick="show('modal13')">Print Modal 9</button>
                </div>
                <hr>
                <div class="flex" style="flex-wrap: wrap;">
                    <button class="btn" onclick="show('modal2')">Delete Modal</button>
                    <button class="btn" onclick="show('modal3')">Save Modal</button>
                    <button class="btn" onclick="show('modal7')">Billing Modal</button>
                    <button class="btn" onclick="show('modal10')">Bar Code Modal</button>
                </div>
                <hr>
                <div class="flex" style="flex-wrap: wrap;">
                    <button class="btn" onclick="show('modal14')">Finance Modal</button>
                    <button class="btn" onclick="show('modal15')">Finance Modal 2</button>
                    <button class="btn" onclick="show('modal16')">Finance Modal 3</button>
                    <button class="btn" onclick="show('modal17')">Finance Modal 4</button>
                    <button class="btn" onclick="show('modal18')">Finance Modal 5</button>
                    <button class="btn" onclick="show('modal19')">Finance Modal 6</button>
                    <button class="btn" onclick="show('modal20')">Finance Modal 7</button>
                    <button class="btn" onclick="show('modal21')">Finance Modal 8</button>
                    <button class="btn" onclick="show('modal22')">Finance Modal 9</button>
                </div>
            </div>
            <!-- modals here -->
            <!-- _________________________________________________________________________________________________________________________ -->
            <!-- print modal 1 here  0/1 -->
            <div id="modal1" class="modal">
                <div class="modalContent1">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal">
                            <label for="sid" class="label-modal">Starting Account</label>
                            <select name="sid" id="sid" class="inp-modal">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal">
                            <label for="eid" class="label-modal">Ending Account</label>
                            <select name="eid" id="eid" class="inp-modal">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal">
                            <label for="from" class="label-modal">Starting Date</label>
                            <span>
                                <input type="text" id="from" class="inp-modal"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal">
                            <label for="to" class="label-modal">Ending Date</label>
                            <span>
                                <input type="text" id="to" class="inp-modal"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 1 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- delete modal here -->
            <div id="modal2" class="modal">
                <div class="modalContent2">
                    <form style="margin-top: 7px;">
                        <div style="text-align: center;margin-top: 25px;">
                            <p class="label-modal2">Are you sure to delete?</label>
                            <div class="form-div-modal2">
                                <button class="modalBtn2" type="submit">Yes</button>
                                <button class="modalBtn2" type="submit">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- delete modal till here -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- save modal here -->
            <div id="modal3" class="modal">
                <div class="modalContent3">
                    <form style="margin-top: 7px;">
                        <div style="text-align: center;margin-top: 25px;">
                            <p class="label-modal3">Want to save the changes made?</label>
                            <div class="form-div-modal3">
                                <button class="modalBtn3" type="submit">Yes</button>
                                <button class="modalBtn3" type="submit">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- save modal till here -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- print modal 2 here  0/1 -->
            <div id="modal4" class="modal">
                <div class="modalContent4">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal4">
                            <label for="sid" class="label-modal4">Starting Account</label>
                            <select name="sid" id="sid" class="inp-modal4">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal4">
                            <label for="eid" class="label-modal4">Ending Account</label>
                            <select name="eid" id="eid" class="inp-modal4">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn4" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 2 till here 1/1 -->
            <!-- _________________________________________________________________________________________________________________________ -->
            <!-- print modal 3 here  0/1 -->
            <div id="modal5" class="modal">
                <div class="modalContent5">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal5">
                            <label for="sid" class="label-modal5">Starting Account</label>
                            <select name="sid" id="sid" class="inp-modal5">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal5">
                            <label for="eid" class="label-modal5">Ending Account</label>
                            <select name="eid" id="eid" class="inp-modal5">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal5">
                            <label for="from" class="label-modal5">Starting Date</label>
                            <span>
                                <input type="text" id="from" class="inp-modal5"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal5">
                            <label for="to" class="label-modal5">Ending Date</label>
                            <span>
                                <input type="text" id="to" class="inp-modal5"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal5">
                            <label for="sid" class="label-modal5">Status</label>
                            <select name="sid" id="sid" class="inp-modal5">
                                <option value="">Completed</option>
                                <option value="">Awaiting</option>
                                <option value="">Cancelled</option>
                            </select>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn5" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 3 till here 1/1 -->
            <!-- _________________________________________________________________________________________________________________________ -->
            <!-- print modal 4 here  0/1 -->
            <div id="modal6" class="modal">
                <div class="modalContent6">
                    <form style="margin-top: 15px;">
                        <div class="form-div-modal6">
                            <label for="from" class="label-modal6">Starting Date</label>
                            <span>
                                <input type="text" id="from" class="inp-modal6"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal6">
                            <label for="to" class="label-modal6">Ending Date</label>
                            <span>
                                <input type="text" id="to" class="inp-modal6"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal6" style="margin-left: -26px;">
                            <div class="form-div-div-modal6" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio">
                                <label for="date">Date</label>
                            </div>
                            <div class="form-div-div-modal6">
                                <input type="radio" name="date" id="date" class="inp-radio">
                                <label for="date">Patient</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn6" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 4 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- billing modal here  0/1 -->
            <div id="modal7" class="modal">
                <div class="modalContent7">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal7">
                            <input type="radio" name="payMode" id="cash" class="inp-radio7">
                            <label for="cash" class="label-modal7">Cash</label>
                        </div>
                        <div class="form-div-modal7">
                            <input type="radio" name="payMode" id="fpx" class="inp-radio7">
                            <label for="fpx" class="label-modal7">FPX</label>
                        </div>
                        <div class="form-div-modal7">
                            <input type="radio" name="payMode" id="card" class="inp-radio7">
                            <label for="card" class="label-modal7">Credit / Debit Card</label>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn7" type="submit">Submit</button>
                    </div>
                </div>
            </div>
            <!-- billing modal till here 1/1 -->
            <!-- _________________________________________________________________________________________________________________________ -->
            <!-- print modal 5 here  0/1 -->
            <div id="modal8" class="modal">
                <div class="modalContent8">
                    <form style="margin-top: 15px;margin-left:12px">
                        <div class="form-div-modal8">
                            <label for="from" class="label-modal8">Starting Vendor Code</label>
                            <select name="sid" id="sid" class="inp-modal8">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal6">
                            <label for="to" class="label-modal8">Ending Vendor Code</label>
                            <select name="sid" id="sid" class="inp-modal8">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal8" style="margin-left: -56px;">
                            <div class="form-div-div-modal8" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio8">
                                <label for="date">Date</label>
                            </div>
                            <div class="form-div-div-modal8">
                                <input type="radio" name="date" id="date" class="inp-radio8">
                                <label for="date">Patient</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn8" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 5 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- print modal 6 here  0/1 -->
            <div id="modal9" class="modal">
                <div class="modalContent9">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal9">
                            <label for="sid" class="label-modal9">Starting Item Code</label>
                            <select name="sid" id="sid" class="inp-modal9">
                                <option value="">00906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal9">
                            <label for="eid" class="label-modal9">Ending Item Code</label>
                            <select name="eid" id="eid" class="inp-modal9">
                                <option value="">00906000</option>
                            </select>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn9" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 6 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- barcode modal here -->
            <div id="modal10" class="modal">
                <div class="modalContent10">
                    <form style="margin-top: 7px;">
                        <div style="text-align: center;margin-top: 25px;">
                            <p class="label-modal10">Scan Bar Code</label>
                            <div class="form-div-modal10">
                                <input type="text" class="inp-modal10">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- barcode modal till here -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- print modal 7 here  0/1 -->
            <div id="modal11" class="modal">
                <div class="modalContent11">
                    <form style="margin-top: 15px;margin-left:12px">
                        <div class="form-div-modal11">
                            <label for="from" class="label-modal11">Starting Vendor Code</label>
                            <select name="sid" id="sid" class="inp-modal11">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal11">
                            <label for="to" class="label-modal11">Ending Vendor Code</label>
                            <select name="sid" id="sid" class="inp-modal11">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal11" style="margin-left: -56px;">
                            <div class="form-div-div-modal11" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio11">
                                <label for="date">Date</label>
                            </div>
                            <div class="form-div-div-modal11">
                                <input type="radio" name="date" id="date" class="inp-radio11">
                                <label for="date">Vendor</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn11" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 7 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- print modal 8 here  0/1 -->
            <div id="modal12" class="modal">
                <div class="modalContent12">
                    <form style="margin-top: 15px;">
                        <div class="form-div-modal12">
                            <label for="from" class="label-modal12">Starting Date</label>
                            <span>
                                <input type="text" id="from" class="inp-modal12"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal12">
                            <label for="to" class="label-modal12">Ending Date</label>
                            <span>
                                <input type="text" id="to" class="inp-modal12"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal12" style="margin-left: -26px;">
                            <div class="form-div-div-modal12" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio12">
                                <label for="date">Date</label>
                            </div>
                            <div class="form-div-div-modal12">
                                <input type="radio" name="date" id="date" class="inp-radio12">
                                <label for="date">Vendor</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn12" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 8 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- print modal 9 here  0/1 -->
            <div id="modal13" class="modal">
                <div class="modalContent13">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal13">
                            <label for="sid" class="label-modal13">Starting Patient ID</label>
                            <select name="sid" id="sid" class="inp-modal13">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal13">
                            <label for="eid" class="label-modal13">Ending Patient ID</label>
                            <select name="eid" id="eid" class="inp-modal13">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal13">
                            <label for="from" class="label-modal13">Starting Date</label>
                            <span>
                                <input type="text" id="from" class="inp-modal13"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal13">
                            <label for="to" class="label-modal13">Ending Date</label>
                            <span>
                                <input type="text" id="to" class="inp-modal13"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn13" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 9 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- finance modal 1 here  0/1 -->
            <div id="modal14" class="modal">
                <div class="modalContent14">
                    <form style="margin-top: 15px;">
                        <div class="form-div-modal14">
                            <label for="from" class="label-modal14">Month</label>
                            <select name="eid" id="eid" class="inp-modal14">
                                <option value="">January</option>
                            </select>
                        </div>
                        <div class="form-div-modal14">
                            <label for="to" class="label-modal14">Year</label>
                            <select name="eid" id="eid" class="inp-modal14">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal14" style="margin-left: -26px;">
                            <div class="form-div-div-modal14" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio14">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal14">
                                <input type="radio" name="date" id="date" class="inp-radio14">
                                <label for="date">Quaterly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn14" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 1 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- finance modal 2 here  0/1 -->
            <div id="modal15" class="modal">
                <div class="modalContent15">
                    <form style="margin-top: 15px;">
                        <div class="form-div-modal15">
                            <label for="from" class="label-modal15">Quater</label>
                            <select name="eid" id="eid" class="inp-modal15">
                                <option value="">First</option>
                            </select>
                        </div>
                        <div class="form-div-modal15">
                            <label for="to" class="label-modal15">Year</label>
                            <select name="eid" id="eid" class="inp-modal15">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal15" style="margin-left: -26px;">
                            <div class="form-div-div-modal15" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio15">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal15">
                                <input type="radio" name="date" id="date" class="inp-radio15">
                                <label for="date">Quaterly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn15" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 2 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->

            <!-- finance modal 3 here  0/1 -->
            <div id="modal16" class="modal">
                <div class="modalContent16">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal16">
                            <label for="sid" class="label-modal16">Starting Account</label>
                            <select name="sid" id="sid" class="inp-modal16">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal16">
                            <label for="eid" class="label-modal16">Ending Account</label>
                            <select name="eid" id="eid" class="inp-modal16">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal16">
                            <label for="from" class="label-modal16">Month</label>
                            <select name="sid" id="sid" class="inp-modal16">
                                <option value="">January</option>
                            </select>
                        </div>
                        <div class="form-div-modal16">
                            <label for="to" class="label-modal16">Year</label>
                            <select name="sid" id="sid" class="inp-modal16">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal16" style="margin-left: -26px;">
                            <div class="form-div-div-modal16" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio16">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal16">
                                <input type="radio" name="date" id="date" class="inp-radio16">
                                <label for="date">Quaterly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn16" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 3 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- finance modal 4 here  0/1 -->
            <div id="modal17" class="modal">
                <div class="modalContent17">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal17">
                            <label for="sid" class="label-modal17">Starting Account</label>
                            <select name="sid" id="sid" class="inp-modal17">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal17">
                            <label for="eid" class="label-modal17">Ending Account</label>
                            <select name="eid" id="eid" class="inp-modal17">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal17">
                            <label for="from" class="label-modal17">Quater</label>
                            <select name="sid" id="sid" class="inp-modal17">
                                <option value="">First</option>
                            </select>
                        </div>
                        <div class="form-div-modal17">
                            <label for="to" class="label-modal17">Year</label>
                            <select name="sid" id="sid" class="inp-modal17">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal17" style="margin-left: -26px;">
                            <div class="form-div-div-modal17" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio17">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal17">
                                <input type="radio" name="date" id="date" class="inp-radio17">
                                <label for="date">Quaterly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn17" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 4 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- ______________________________________________________________________________________________________________________ -->

            <!-- finance modal 5 here  0/1 -->
            <div id="modal18" class="modal">
                <div class="modalContent18">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal18">
                            <label for="sid" class="label-modal18">Starting Item</label>
                            <select name="sid" id="sid" class="inp-modal18">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal18">
                            <label for="eid" class="label-modal18">Ending Item</label>
                            <select name="eid" id="eid" class="inp-modal18">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal18">
                            <label for="from" class="label-modal18">Month</label>
                            <select name="sid" id="sid" class="inp-modal18">
                                <option value="">January</option>
                            </select>
                        </div>
                        <div class="form-div-modal18">
                            <label for="to" class="label-modal18">Year</label>
                            <select name="sid" id="sid" class="inp-modal18">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal18" style="margin-left: -26px;">
                            <div class="form-div-div-modal18" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio18">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal18">
                                <input type="radio" name="date" id="date" class="inp-radio18">
                                <label for="date">Quaterly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn18" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 5 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- finance modal 6 here  0/1 -->
            <div id="modal19" class="modal">
                <div class="modalContent19">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal19">
                            <label for="sid" class="label-modal19">Starting Item</label>
                            <select name="sid" id="sid" class="inp-modal19">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal19">
                            <label for="eid" class="label-modal19">Ending Item</label>
                            <select name="eid" id="eid" class="inp-modal19">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal19">
                            <label for="from" class="label-modal19">Quater</label>
                            <select name="sid" id="sid" class="inp-modal19">
                                <option value="">First</option>
                            </select>
                        </div>
                        <div class="form-div-modal19">
                            <label for="to" class="label-modal19">Year</label>
                            <select name="sid" id="sid" class="inp-modal19">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal19" style="margin-left: -26px;">
                            <div class="form-div-div-modal19" style="justify-content: flex-end;margin-right: 10px;">
                                <input type="radio" name="date" id="date" class="inp-radio19">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal19">
                                <input type="radio" name="date" id="date" class="inp-radio19">
                                <label for="date">Quaterly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn19" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 6 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- finance modal 7 here  0/1 -->
            <div id="modal20" class="modal">
                <div class="modalContent20">
                    <form style="margin-top: 15px;">
                        <div class="form-div-modal20">
                            <label for="from" class="label-modal20">Month</label>
                            <select name="eid" id="eid" class="inp-modal20">
                                <option value="">January</option>
                            </select>
                        </div>
                        <div class="form-div-modal20">
                            <label for="to" class="label-modal20">Year</label>
                            <select name="eid" id="eid" class="inp-modal20">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal20">
                            <div class="form-div-div-modal20" style="justify-content: flex-end;">
                                <input type="radio" name="date" id="date" class="inp-radio20">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal20">
                                <input type="radio" name="date" id="date" class="inp-radio20">
                                <label for="date">Quaterly</label>
                            </div>
                            <div class="form-div-div-modal20">
                                <input type="radio" name="date" id="date" class="inp-radio20">
                                <label for="date">Yearly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn20" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 7 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- finance modal 8 here  0/1 -->
            <div id="modal21" class="modal">
                <div class="modalContent21">
                    <form style="margin-top: 15px;">
                        <div class="form-div-modal21">
                            <label for="from" class="label-modal21">Quater</label>
                            <select name="eid" id="eid" class="inp-modal21">
                                <option value="">First</option>
                            </select>
                        </div>
                        <div class="form-div-modal21">
                            <label for="to" class="label-modal21">Year</label>
                            <select name="eid" id="eid" class="inp-modal21">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal21">
                            <div class="form-div-div-modal21" style="justify-content: flex-end;">
                                <input type="radio" name="date" id="date" class="inp-radio21">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal21">
                                <input type="radio" name="date" id="date" class="inp-radio21">
                                <label for="date">Quaterly</label>
                            </div>
                            <div class="form-div-div-modal21">
                                <input type="radio" name="date" id="date" class="inp-radio21">
                                <label for="date">Yearly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn21" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 8 till here 1/1 -->
            <!-- ______________________________________________________________________________________________________________________ -->
            <!-- finance modal 9 here  0/1 -->
            <div id="modal22" class="modal">
                <div class="modalContent22">
                    <form style="margin-top: 15px;">
                        <div class="form-div-modal22">
                            <label for="to" class="label-modal22">Year</label>
                            <select name="eid" id="eid" class="inp-modal22">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-div-modal22">
                            <div class="form-div-div-modal22" style="justify-content: flex-end;">
                                <input type="radio" name="date" id="date" class="inp-radio22">
                                <label for="date">Monthly</label>
                            </div>
                            <div class="form-div-div-modal22">
                                <input type="radio" name="date" id="date" class="inp-radio22">
                                <label for="date">Quaterly</label>
                            </div>
                            <div class="form-div-div-modal22">
                                <input type="radio" name="date" id="date" class="inp-radio22">
                                <label for="date">Yearly</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn22" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- finance modal 9 till here 1/1 -->
        </div>
    </div>
    <script type="text/javascript">
        function toggleSidebar() {
            document
                .getElementById("container")
                .classList.toggle("container-no-sidebar");
            document.getElementById("sidebar").classList.toggle("active");
            document.getElementById("arrow-left").classList.toggle("active");
        }
    </script>
    <script>
        function show(x) {
            document.getElementById(x).style.display = "flex";
        }
        window.onclick = function (event) {
            var ele = document.getElementsByClassName("modal");
            for (var i = 0; i < ele.length; i++) {
                if (event.target == ele[i]) {
                    ele[i].style.display = "none";
                }
            }
        }

    </script>
</body>

</html>