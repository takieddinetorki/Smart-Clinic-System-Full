<?php
if (getcwd() == 'C:\xampp\htdocs\smartClinicSystem') 
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
else if (getcwd() == 'C:\xampp\htdocs\smartClinicSystem\byCMkGnmDa3mXlyfgPh') 
require_once 'core/init.php';
else require_once '../core/init.php';

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
        $varRoot = __ROOT__;
        $image = $varRoot.'\files\profile_pictures\patients\\'.hex2bin($patientInfo->picture);
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(file_get_contents($image));

        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data:'.mime_content_type($image).';base64,'.$imageData;
       // echo "DETAILS  ->  "+strval($image)+"   "+"   ";

        $html =
            '<!DOCTYPE html><html lang="en">' . $this->head . '
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
                        <img style="width: 100px; height: 128px;" src="'.$src.'">
                        </div>
                </div>

                <div style="clear:both;"></div>

                <div>Address: ' . hex2bin($patientInfo->addressA).' '. hex2bin($patientInfo->addressB). '</div>
                
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
        // foreach ($medicalCertList as $cert) {
        //     $row .= '<tr>
        //                 <td>' . $count++ . '.</td>
        //                 <td>' . $cert->patientID . '</td>
        //                 <td style="text-align:left;">' . hex2bin($cert->patientName) . '<br>' . hex2bin($cert->NRIC) . '</td>
        //                 <td>&nbsp;<br>' . hex2bin($cert->mobileNo) . '</td>
        //                 <td>&nbsp;<br>' . $cert->startingDate . '</td>
        //                 <td>&nbsp;<br>' . $cert->receiptNo . '</td>
        //                 <td style="text-align:left;">' . $cert->doctorID . '<br>' . $cert->doctorName . '</td>
        //             </tr>';
        // }

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