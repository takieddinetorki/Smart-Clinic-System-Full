<?php
require_once '../core/init.php';

/**
 * Code Written by: Leong
 * File Name: ReportGeneration.php
 * Class Name: ReportGeneration
 * Purpose of the file: Generate report content using HTML, CSS and JavaScript syntax for later conversion to PDF
 * Functions included: setOrientationAndTitle, generatePatient, generateAppointment, generateAppointmentList, generateMedCertList, generateMedCert
 **/

class ReportGeneration
{
    private $today, $company, $companyNo, $preparedBy, $street, $postcode, $city, $state, $tel, $fax, $head;

    public function __construct()
    {
        // thse values should be stored on database
        $this->today = date('j F Y');
        $this->company = "COMPANY ABC SDN BHD";
        $this->companyNo = "1234567-P";
        $this->preparedBy = "SMART CLINIC SDN BHD";
        $this->street = "NO 123, Jalan Helang";
        $this->postcode = "11700";
        $this->city = "Gelugor";
        $this->state = "Penang";
        $this->tel = "06-1234567";
        $this->fax = "03-1234567";

        $this->head =  "<head>
                            <style>
                                @page {
                                    margin: 0cm 0cm;
                                    margin-left: 2cm;
                                    margin-right: 2cm;
                                    font-size: 14px;
                                }

                                body {
                                    margin-top: 3.5cm;
                                    margin-bottom: 1.5cm;
                                }

                                header {
                                    position: fixed;
                                    top: 0.5cm;
                                    left: 0cm;
                                    right: 0cm;
                                    height: 3cm;
                                    text-align: center;
                                    font-weight: bold;
                                    font-size: 16px;
                                }

                                footer {
                                    position: fixed; 
                                    bottom: 0cm; 
                                    left: 0cm; 
                                    right: 0cm;
                                    height: 1.25cm;
                                    text-align: center;
                                    padding-top: 0.1cm;
                                    border-top: 0.05em solid black;
                                }

                                table {
                                    border-collapse: collapse;
                                }

                                table th {
                                    border-top: 0.05em solid black;
                                    border-bottom: 0.05em solid black;
                                }

                                th, td {
                                    padding: 4px;
                                }
                            
                            </style>
                        </head>";
    }

    // set PDF orientation and PDF page title
    public function setOrientationAndTitle($orientation, $pageTitle)
    {
        if ($orientation == "portrait") {
            $x = 500;
            $y = 810;
        } else {
            $x = 735;
            $y = 560;
        }

        $script =  '<script type="text/php">
                        // Generate Page Number
                        if (isset($pdf)) {
                            $x=' . $x . '; 
                            $y=' . $y . '; 
                            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                            $font = $fontMetrics->get_font("", "normal");
                            $size = 11;
                            $color = array(0,0,0);
                            $word_space = 0.0;  //  default
                            $char_space = 0.0;  //  default
                            $angle = 0.0;   //  default
                            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                        }
                    </script>
                    
                    <header>
                        <p>' . $this->company . '</p>
                        <span>' . $pageTitle . '</span><br>
                        <span>As At ' . $this->today . '</span>
                    </header>

                    <footer>
                        ' . $this->preparedBy . '
                    </footer>';

        return $script;
    }

    // generate Patient details PDF
    public function generatePatient($val)
    {
        $staff = new staff();
        $patientInfo = $staff->getPatientById($val);
        $medicalInfo = $staff->getMedicalHistory($val);
        $doctorInfo = $staff->getDoctorByID($medicalInfo->doctorID);

        $html =
            '<html>' . $this->head . '
                <body>' . $this->setOrientationAndTitle("portrait", "Patient Details") .
            '<span style="float:left;">Patient ID: ' . $val . '</span>
                <span style="float:right;">Date: ' . $this->today . '</span>
                <div style="clear:both;"></div>

                <hr>
                <div style="text-align: center">PERSONAL DETAILS OF PATIENT</div>
                <hr>

                <br>
                <br>

                <div>
                    <div style="display:inline-block;width:80%;">
                        <div>Name: ' . hex2bin($patientInfo->name) . '</div>
                        <br>
                        <div>NRIC: ' . hex2bin($patientInfo->NRIC) . '</div>
                        <br>
                        <div>Age: ' . hex2bin($patientInfo->age) . '</div>
                        <br>
                        <div>Date of Birth: ' . $patientInfo->dob . '</div>
                    </div>
                    <div style="display:inline-block;">
                        <img style="width: 100px; height: 128px;"src="data:image/jpeg;base64,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"
                        </div>
                </div>

                <div style="clear:both;"></div>

                <div>Address: ' . hex2bin($patientInfo->address) . '</div>
                
                <br>

                <div>
                    <div style="display:inline-block;width:50%;">Gender: ' . hex2bin($patientInfo->gender) . '</div>
                    <div style="display:inline-block;">Mobile No. :' . hex2bin($patientInfo->mobileNo) . '</div>
                </div>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">Race: ' . hex2bin($patientInfo->race) . '</div>    
                    <div style="display:inline-block;">Nationality: ' . hex2bin($patientInfo->nationality) . '</div>    
                </div>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">Marital status: ' . hex2bin($patientInfo->maritalStatus) . '</div>
                    <div style="display:inline-block;">Spouse name: ' . hex2bin($patientInfo->spouseName) . '</div>
                </div>
             
                <br>

                <hr>
                <div style="text-align: center">MEDICAL HISTORY</div>
                <hr>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">ILLNESS: ' . hex2bin($medicalInfo->illness) . '</div>
                    <div style="display:inline-block;">SMOKING: ' . hex2bin($medicalInfo->smoking) . '</div>
                </div>
                
                <br>

                <div>
                    <div style="display:inline-block;width:50%;">DRINKING: ' . hex2bin($medicalInfo->drinking) . '</div>
                    <div style="display:inline-block;">TOBACCO: ' . hex2bin($medicalInfo->tobacco) . '</div>
                </div>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">OTHERS: ' . hex2bin($medicalInfo->tobacco) . '</div>
                    <div style="display:inline-block;">ALLERGIES: Food(' .
            hex2bin($medicalInfo->foodAllergies) .
            "), Drug(" .
            hex2bin($medicalInfo->drugAllergies) .
            "), Other(" .
            hex2bin($medicalInfo->otherAllergies) .
            ")" . '</div>
                </div>

                <br>

                <hr>
                <div style="text-align: center">EMERGENCY CONTACT DETAILS</div>
                <hr>

                <br>

                <div>NAME: ' . hex2bin($patientInfo->spouseName) . '</div>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">TEL NO.: ' . hex2bin($patientInfo->emergencyContact) . '</div>
                    <div style="display:inline-block;">RELATIONSHIP: ' . hex2bin($patientInfo->relationship) . '</div>
                </div>

                <br>

                <hr>
                <div style="text-align: center">DOCTOR DETAILS</div>
                <hr>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">DOCTOR ID: ' . $doctorInfo->doctorID . '</div>
                    <div style="display:inline-block;">DOCTOR NAME: ' . $doctorInfo->name . '</div>
                </div>
       
                </body>
            </html>';

        $filename = "Patient Report - " . hex2bin($patientInfo->name);
        ReportPrinting::printPDF($html, $filename, "portrait");
    }

    // generate Patients list PDF
    public function generatePatientList($startVal, $endVal)
    {
        $staff = new staff();
        $patientList = $staff->getPatientByIds($startVal, $endVal);

        $row = "";
        $count = 1;
        foreach ($patientList as $patient) {
            $row .= '<tr>
                        <td>' . $count++ . '.</td>
                        <td>' . $patient->patientID . '</td>
                        <td>' . hex2bin($patient->name) . '</td>
                        <td>' . hex2bin($patient->NRIC) . '</td>
                        <td>' . hex2bin($patient->gender) . '</td>
                        <td>' . $patient->dob . '</td>
                        <td>' . hex2bin($patient->age) . '</td>
                        <td>' . hex2bin($patient->mobileNo) . '</td>
                        <td>' . hex2bin($patient->address) . '</td>
                        <td>' . hex2bin($patient->nationality) . '</td>
                        <td>' . hex2bin($patient->maritalStatus) . '</td>
                    </tr>';
        }

        $html = '<html>' . $this->head . '
                    <body>' . $this->setOrientationAndTitle("landscape", "Patients List") .
            '<span style="float:left;">Patients ID: ' . $startVal . ' To ' . $endVal . '</span>
                        <div style="clear:both;"></div>
                    
                        <table style="width:100%; text-align:center">
                            <tr>
                                <th width="2%">NO</th>
                                <th width="10%">ID</th>
                                <th width="17%">Name</th>
                                <th width="10%">NRIC</th>
                                <th width="8%">Gender</th>
                                <th width="10%">Date of Birth</th>
                                <th width="4%">Age</th>
                                <th width="10%">Mobile No</th>
                                <th width="15%">Address</th>
                                <th width="10%">Nationality</th>
                                <th width="9%">Marital Status</th>
                            </tr>'
            . $row .
            '</table>
                    </body>
                </html>';
        $filename = "Patients List on " . $this->today;
        ReportPrinting::printPDF($html, $filename);
    }

    // generate Appointment details PDF
    public function generateAppointment($val)
    {
        $staff = new staff();
        $appointmentInfo = $staff->getAppointmentById($val);
        $html =
            '<html>' . $this->head . '
             <body>' . $this->setOrientationAndTitle("portrait", "Appointment") . '
                <span style="float:left;">Patient ID: ' . $appointmentInfo->patientID . '</span>
                <span style="float:right;">Date: ' . $this->today . '</span>
                <div style="clear:both;"></div>
                <body>
                    <br>
                    <br>

                    <div>
                        <div style="display:inline-block;width:60%;">NAME: ' . hex2bin($appointmentInfo->patientName) . '</div>
                        <div style="display:inline-block;">NRIC/PASSPORT NO: ' . hex2bin($appointmentInfo->NRIC) . '</div>
                    </div>

                    <br> 
                    <div>
                        <div style="display:inline-block;width:60%;">DATE: ' . $appointmentInfo->date . '</div>
                        <div style="display:inline-block;">TIME: ' . $appointmentInfo->time . '</div>
                    </div>
                    
                    <br> 

                    <div>
                        <div style="display:inline-block;width:60%;">Doctor ID: ' . $appointmentInfo->doctorID . '</div>
                        <div style="display:inline-block;">Doctor name: ' . $appointmentInfo->doctorName . '</div>
                    </div>

                </body>
            </html>';

        $filename = "Appointment Report - " . $val;
        ReportPrinting::printPDF($html, $filename, "portrait");
    }

    // generate Appointments List PDF
    public function generateAppointmentList($startID, $endID, $startDate, $endDate, $status)
    {
        $staff = new staff();
        $appointmentList = $staff->getAppointmentByCondition($startID, $endID, $startDate, $endDate, $status);

        $row = "";
        $count = 1;
        foreach ($appointmentList as $appointment) {
            $row .= '<tr>
                        <td>' . $count++ . '.</td>
                        <td>' . $appointment->patientID . '</td>
                        <td style="text-align:left;">' . hex2bin($appointment->patientName) . '<br>' . hex2bin($appointment->NRIC) . '</td>
                        <td>&nbsp;<br>' . hex2bin($appointment->mobileNo) . '</td>
                        <td>&nbsp;<br>' . $appointment->date . '</td>
                        <td>&nbsp;<br>' . $appointment->time . '</td>
                        <td>&nbsp;<br>' . $appointment->status . '</td>
                        <td style="text-align:left;">' . $appointment->doctorID . '<br>' . $appointment->doctorName . '</td>
                    </tr>';
        }

        $html =
            '<html>' . $this->head . '
                    <body>' . $this->setOrientationAndTitle("landscape", "Appointments List") . '
                    <span style="float:left;">Patients ID: ' . $startID . ' To ' . $endID . '</span>
                    <span style="float:right;">Date: ' . $startDate . ' To ' . $endDate . '</span>
                    <div style="clear:both;"></div>
                        
                        <table style="width:100%; text-align:center">
                            <tr>
                                <th width="2%">NO</th>
                                <th width="13%">PATIENT ID</th>
                                <th width="27%" style="text-align:left;">PATIENT NAME<br>I.C NO. / PASSPORT NO.</th>
                                <th width="10%">MOBILE NO.</th>
                                <th width="9%">DATE</th>
                                <th width="13%">TIME</th>
                                <th width="13%">STATUS</th>
                                <th width="13%" style="text-align:left;">DOCTOR ID<br>DOCTOR NAME</th>
                            </tr>'
            . $row .
            '</table>
                    </body>
                </html>';
        $filename = "Appointment List on " . $this->today;
        ReportPrinting::printPDF($html, $filename);
    }

    // generate Medical Certificates List PDF
    public function generateMedCertList($startID, $endID, $startDate, $endDate)
    {
        $staff = new staff();
        $medicalCertList = $staff->getMedCertByCondition($startID, $endID, $startDate, $endDate);

        $row = "";
        $count = 1;
        foreach ($medicalCertList as $cert) {
            $row .= '<tr>
                        <td>' . $count++ . '.</td>
                        <td>' . $cert->patientID . '</td>
                        <td style="text-align:left;">' . hex2bin($cert->patientName) . '<br>' . hex2bin($cert->NRIC) . '</td>
                        <td>&nbsp;<br>' . hex2bin($cert->mobileNo) . '</td>
                        <td>&nbsp;<br>' . $cert->startingDate . '</td>
                        <td>&nbsp;<br>' . $cert->receiptNo . '</td>
                        <td style="text-align:left;">' . $cert->doctorID . '<br>' . $cert->doctorName . '</td>
                    </tr>';
        }

        $html =
            '<html>' . $this->head . '
                    <body>' . $this->setOrientationAndTitle("landscape", "Medical Certificates List") . '
                    <span style="float:left;">Patients ID: ' . $startID . ' To ' . $endID . '</span>
                    <span style="float:right;">Date: ' . $startDate . ' To ' . $endDate . '</span>
                    <div style="clear:both;"></div>
                        
                        <table style="width:100%; text-align:center">
                            <tr>
                                <th width="2%">NO</th>
                                <th width="15%">PATIENT ID</th>
                                <th width="37%" style="text-align:left;">PATIENT NAME<br>I.C NO. / PASSPORT NO.</th>
                                <th width="10%">MOBILE NO.</th>
                                <th width="10%">DATE</th>
                                <th width="13%">RECEIPT NO</th>
                                <th width="13%" style="text-align:left;">DOCTOR ID<br>DOCTOR NAME</th>
                            </tr>'
            . $row .
            '</table>
                    </body>
                </html>';
        $filename = "Medical Certificates List on " . $this->today;
        ReportPrinting::printPDF($html, $filename);
    }

    // generate Medical Certificate PDF
    public function generateMedCert($val)
    {
        $staff = new staff();
        $certInfo = $staff->editMedCertByReceiptNo($val);
        $certInfo->PatientName = hex2bin($certInfo->PatientName);
        $certInfo->NRIC = hex2bin($certInfo->NRIC);
        $start = strtotime($certInfo->startingDate);
        $end = strtotime($certInfo->endingDate);
        $days_between = ceil(abs($end - $start) / 86400) + 1;

        $html =
            '<html>
                <head>
                    <style>
                        @page {
                            margin: 0cm 0cm;
                            margin-left: 2cm;
                            margin-right: 2cm;
                            font-size: 14px;
                        }

                        body {
                            margin-top: 2.0cm;
                            margin-bottom: 1.5cm;
                        }

                        footer {
                            position: fixed; 
                            bottom: 0cm; 
                            left: 0cm; 
                            right: 0cm;
                            height: 1.25cm;
                            text-align: center;
                            padding-top: 0.1cm;
                            border-top: 0.05em solid black;
                        }
                    </style>
                </head>

                <body>
                <script type="text/php">
                            // Generate Page Number
                            if (isset($pdf)) {
                                $x=500;
                                $y=810;
                                $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                                $font = $fontMetrics->get_font("", "normal");
                                $size = 11;
                                $color = array(0,0,0);
                                $word_space = 0.0;  //  default
                                $char_space = 0.0;  //  default
                                $angle = 0.0;   //  default
                                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                            }
                        </script>

                        <footer>
                            ' . $this->preparedBy . '
                        </footer>
               <div style="font-size:24px;">' . $this->company . '</div>

               <div>
                    <div style="display:inline-block;width:70%;">
                        <div>COMPANY NO: ' . $this->companyNo . '</div>
                        <div>' . $this->street . '</div>
                        <div>' . $this->postcode . ' ' . $this->city . ', ' . $this->state . '</div>
                    </div>
                    <div style="display:inline-block;text-align:center;width:29%;">
                        <p style="border-style:dotted;padding:12px 0px;font-size:24px;">R004</p>
                    </div>
                <div>
                    <div style="display:inline-block;width:71%;">TEL: ' . $this->tel . ' FAX: ' . $this->fax . '</div>
                    <div style="display:inline-block;">Date: ' . $this->today . '</div>
                </div> <br> <br>

               <div style="text-align:center;font-size:20px;font-weight:bold;">MEDICAL CERTIFICATE</div>

               <br>
               <div>This is to certify that I have examined <span style="text-decoration: underline;font-size:17px;">' . $certInfo->PatientName . ' (NRIC:' . $certInfo->NRIC . ')</span></div>
               <div>He/She is unfit for the proper performance of his/her duties from
                    <span style="text-decoration: underline;font-size:17px;">
                    ' . $certInfo->startingDate . '
                    </span>
                    to
                    <span style="text-decoration: underline;font-size:17px;">
                    ' . $certInfo->endingDate . '
                    </span>
               </div>
               <div>for <span style="text-decoration: underline;font-size:17px;">' . $days_between . '</span> days.</div>

               <br> <br> <br> <br>
               <div>
                    <div style="display:inline-block;width:71%;">
                    <br> <br>
                        <div>Authorised By,</div>
                        <br> <br> <br> <br>
                        <span style="text-decoration: underline;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                        <div>Signature of Medical Practicioner</div>
                        <div>' . $certInfo->doctorID . '</div>
                        <div>' . $certInfo->DoctorName . '</div>
                    </div>

                    <div style="display:inline-block;width:29%;">
                        <div style="border-style:solid;padding: 32px 0px;">&nbsp;</div>
                        <div style="text-align:center;font-size:14px;">(OFFICIAL CHOP OF CLINIC)</div>
                    </div>
               </div>
            </body>
        </html>';

        $filename = "Medical Certificate - " . $certInfo->PatientName;
        ReportPrinting::printPDF($html, $filename, "portrait");
    }

    // by yeasin
    public function generateDiagonasticRepor($data)
    {
        $staff = new staff();
        $patientInfo = $staff->getPatientById($data['id']);
        // $medicalInfo = $staff->getMedicalHistory($data);
        $doctorInfo = $staff->getDoctorByID($data['doctorID']);
        $row = '';
        foreach($data['medicines'] as $medi){
            $row .= '<tr style="border: 2px solid black; border-collapse: collapse;">
            <td style="border: 2px solid black; border-collapse: collapse;">'.$medi['name'].'</td>
            <td style="border: 2px solid black; border-collapse: collapse;">'.$medi['dosage'].'</td>
            <td style="border: 2px solid black; border-collapse: collapse;">'.$medi['frequency'].'</td>
            <td style="border: 2px solid black; border-collapse: collapse;">'.$medi['days'].'</td>
            <td style="border: 2px solid black; border-collapse: collapse;">'.$medi['instructions'].'</td>
            </tr>';
        }

        $html =
            '<html>' . $this->head . '
                <body>' . $this->setOrientationAndTitle("portrait", "Patient Details") .
            '<span style="float:left;">Patient ID: ' . $data['id'] . '</span>
                <span style="float:right;">Date: ' . $this->today . '</span>
                <div style="clear:both;"></div>

                <hr>
                <div style="text-align: center">PERSONAL DETAILS OF PATIENT</div>
                <hr>

                <br>
                <br>

                <div>
                    <div style="display:inline-block;width:80%;">
                        <div>Name: ' . deescape($patientInfo->name) . '</div>
                        <br>
                        <div>NRIC: ' . deescape($patientInfo->NRIC) . '</div>
                        <br>
                        <div>Age: ' . deescape($patientInfo->age) . '</div>
                        <br>
                        <div>Date of Birth: ' . $patientInfo->dob . '</div>
                    </div>
                    <div style="display:inline-block;">
                        <img style="width: 100px; height: 128px;"src="'.deescape($patientInfo->picture).'">
                        </div>
                </div>

                <div style="clear:both;"></div>

                <div>Address: ' . deescape($patientInfo->address) . '</div>
                
                <br>

                <div>
                    <div style="display:inline-block;width:50%;">Gender: ' . deescape($patientInfo->gender) . '</div>
                    <div style="display:inline-block;">Mobile No. :' . deescape($patientInfo->mobileNo) . '</div>
                </div>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">Race: ' . deescape($patientInfo->race) . '</div>    
                    <div style="display:inline-block;">Nationality: ' . deescape($patientInfo->nationality) . '</div>    
                </div>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">Marital status: ' . deescape($patientInfo->maritalStatus) . '</div>
                    <div style="display:inline-block;">Spouse name: ' . deescape($patientInfo->spouseName) . '</div>
                </div>
             
                <br>

                <hr>
                <div style="text-align: center">MEDICAL NOTES</div>
                <hr>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">BMI: ' . $data['medicalNotes']['result'] . ' ~'.$data['medicalNotes']['bmi'].'</div>
                    <div>Symptoms: ' . implode(", ", $data['medicalNotes']['symptoms']) . '</div>
                </div>
                <br>

                <hr>
                <div style="text-align: center">DIAGNOSIS</div>
                <hr>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">FINDINGS: ' . $data['diagnosis']['finding'] .'</div>
                    <div">ADVISE: ' . $data['diagnosis']['advice'] . '</div>
                    <div">DIAGNOSIS: ' . implode(", ", $data['diagnosis']['diaglist']) . '</div>
                </div>
                <br>


                <hr>
                <div style="text-align: center">TREATMENT</div>
                <hr>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">ALLERGY: ' . implode(", ", $data['treatments']['allergy']) .'</div>
                    <div">CONSULTATION: ' . $data['treatments']['advice'] . '</div>
                    <div">TREATMENT: ' . implode(", ", $data['treatments']['treatment']) . '</div>
                </div>
                <br>

                <br>
                <div style="page-break-before: always;"></div>
                <br>
                <hr>
                <div style="text-align: center">PRESCRIPTION</div>
                <hr>

                <br>

                <div>
                <div style="clear:both;"></div>
                        
                <table style="width:100%; text-align:center; border: 2px solid black; border-collapse: collapse;">
                    <tr>
                        <th style="border: 2px solid black; border-collapse: collapse;">DRUG</th>
                        <th style="border: 2px solid black; border-collapse: collapse;">DOSAGE</th>
                        <th style="border: 2px solid black; border-collapse: collapse;">FREQUENCY</th>
                        <th style="border: 2px solid black; border-collapse: collapse;">NUMBER OF DAYS</th>
                        <th style="border: 2px solid black; border-collapse: collapse;">INSTRUCTIONS</th>
                    </tr>'
    . $row .
    '</table>
                </div>
                <br>
                <hr>
                <div style="text-align: center">DOCTOR DETAILS</div>
                <hr>

                <br>

                <div>
                    <div style="display:inline-block;width:50%;">DOCTOR ID: ' . $doctorInfo->doctorID . '</div>
                    <div style="display:inline-block;">DOCTOR NAME: ' . deescape($doctorInfo->name) . '</div>
                </div>
       
                </body>
            </html>';

        $filename = "Diagnostic Report - " . $patientInfo->patientID;
        $fileLocation = "../files/reports/diagnosis_report/{$filename}.pdf";
        if(ReportPrinting::savePDF($html, $fileLocation, "portrait")) return $fileLocation;
        else 'A problem Has been occured during report generating';
    }


}