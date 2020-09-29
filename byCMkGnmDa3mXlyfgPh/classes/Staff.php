<?php

class Staff
{
    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
        $user = new User();
        $this->_sessionName = Config::get('session/session_name');
        if (Session::exists($this->_sessionName)) {
            $this->_db->setConnection($user->data()->clinicID);
        }
    }
    //created by Yash for dashboard graphs
    public function getDataforPateintCurrentWeek()
    {
        $firstdayofweek = strval(date('Y-m-d', strtotime("this week"))); 
        $sql =  "SELECT count(*) AS count, DATE_FORMAT(date,'%d') as temp FROM patients WHERE date >= CAST(? AS DATE)  GROUP BY temp";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofweek))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }
    public function getDataforPateintCurrentMonth()
    {
        $firstdayofmonth = strval(date('Y-m-01'));
        $sql =  "SELECT count(*) AS count, DATE_FORMAT(date,'%d') as temp FROM patients WHERE date >= CAST(? AS DATE)  GROUP BY temp";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofmonth))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }
    public function getDataforPateintCurrentYear()
    {
        $firstdayofyear = strval(date('Y-01-01'));
        $sql =  "SELECT count(*) AS count, DATE_FORMAT(date,'%m') as temp FROM patients WHERE date >= CAST(? AS DATE) GROUP BY temp";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofyear))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }
    public function getDataforSalesCurrentWeek()
    {
        $firstdayofweek = strval(date('Y-m-d', strtotime("this week"))); 
        $sql =  "SELECT count(*) AS count, DATE_FORMAT(date,'%d') as temp FROM expenses WHERE date >= CAST(? AS DATE)  GROUP BY temp";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofweek))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }
    public function getDataforSalesCurrentMonth()
    {
        $firstdayofmonth = strval(date('Y-m-01'));
        $sql =  "SELECT count(*) AS count, DATE_FORMAT(date,'%d') as temp FROM expenses WHERE date >= CAST(? AS DATE)  GROUP BY temp";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofmonth))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }
    public function getDataforSalesCurrentYear()
    {
        $firstdayofyear = strval(date('Y-01-01'));
        $sql =  "SELECT count(*) AS count, DATE_FORMAT(date,'%m') as temp FROM expenses WHERE date >= CAST(? AS DATE) GROUP BY temp";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofyear))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }

    
    public function getexpiredStockCurrentweek(){
        $firstdayofweek = strval(date('Y-m-d', strtotime("this week"))); 
        $sql =  "SELECT count(*) AS count FROM inventory WHERE expiry BETWEEN CAST(? AS DATE) and CURRENT_DATE()";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofweek))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }
    public function getexpiredStockCurrentMonth(){
        $firstdayofmonth = strval(date('Y-m-01'));
        $sql =  "SELECT count(*) AS count FROM inventory WHERE expiry BETWEEN CAST(? AS DATE) and CURRENT_DATE()";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofmonth))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }
    public function getexpiredStockCurrentYear(){
        $firstdayofyear = strval(date('Y-01-01'));
        $sql =  "SELECT count(*) AS count FROM inventory WHERE expiry BETWEEN CAST(? AS DATE) and CURRENT_DATE()";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofyear))->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }
    public function gettotalStock(){
        $sql =  "SELECT count(*) AS count FROM inventory WHERE quantity>0";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) echo json_encode($values);
        else echo json_encode(array('status' => "error"));
    }


    // created by Leong
    public function getPatientById($val)
    {
        if ($data = $this->_db->get('_pdo2', 'patients', array('patientID', '=', $val))) return $data->first();
        else 'Patient ID not found in the Database.';
    }
    //by Yeasin
    public function getMedicalHistoryById($val)
    {
        if ($data = $this->_db->get('_pdo2', 'medical_history', array('patientID', '=', $val))) return $data->first();
        else 'Medical Histroy not found in the Database.';
    }

    // created by Leong
    public function getPatientByIds($startVal, $endVal)
    {
        $sql = "SELECT * FROM patients WHERE patientID BETWEEN ? AND ?";
        if ($values = $this->_db->query('_pdo2', $sql, array($startVal, $endVal))->results()) return $values;
        else echo "There is no patient found.";
    }

    // created by Leong
    public function getAppointmentById($val, $db = '_pdo2')
    {
        $user = new User();
        $clinicID =  $user->data()->clinicID;

        $sql = "SELECT A.appointmentID, A.date, A.time, A.status, P.patientID, P.name AS patientName, D.doctorID, D.name AS doctorName
               FROM appointment A 
               JOIN patients P ON A.patientID = P.patientID
               JOIN doctors D ON A.doctorID = D.doctorID 
               WHERE A.appointmentID = ?";

        if ($values = $this->_db->query($db, $sql, array($val))->first()) return $values;
        else echo "There is no patient found.";
    }

    // created by Leong
    public function getAppointmentByCondition($startID, $endID, $startDate, $endDate, $status, $db = '_pdo2')
    {
        $user = new User();
        $clinicID =  $user->data()->clinicID;
        $conditional_array = array();

        $condition = " WHERE 1=1 ";
        if (!empty($startID) && !empty($endID)) {
            $condition .= ' and A.appointmentID between ? and ? ';
            array_push($conditional_array, $startID, $endID);
        }

        if (!empty($startDate) && !empty($endDate)) {
            $condition .= ' and A.date between ? and ? ';
            array_push($conditional_array, $startDate, $endDate);
        }

        if (!empty($status)) {
            $condition .= ' and A.status = ? ';
            array_push($conditional_array, $status);
        }

        $sql = "SELECT A.appointmentID, A.date, A.time, A.status, P.patientID, P.NRIC, P.name AS patientName, P.mobileNo, D.doctorID, D.name AS doctorName
               FROM {$clinicID}.appointment A 
               JOIN {$clinicID}.patients P ON A.patientID = P.patientID 
               JOIN smart_clinic.doctor D ON A.doctorID = D.doctorID {$condition}";

        if ($values = $this->_db->query($db, $sql, $conditional_array)->results()) return $values;
        else echo "There is no patient found.";
    }

    public function createPatient($field, $db = '_pdo2')
    {
        if ($this->_db->insert($db, 'patients', $field)) return true;
        else return false;
    }

    public function editPatient($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('patients', 'patientID', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the patient.";
    }

    public function deletePatient($condition_Value, $db = '_pdo2')
    {
        if ($this->_db->delete($db, 'patients', array('patientID', '=', $condition_Value))) return true;
        else return false;
    }

    public function creatMedicalHistory($fields, $db = '_pdo2')
    {
        if ($this->_db->insert($db, 'medical_history', $fields)) return true;
        else return false;
    }

    public function editMedicalHistory($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('medical_history', 'patientID', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the patient.";
    }

    public function deleteMedicalHistory($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'medical_history', array('patientID', '=', $condition_Value)))
            echo "A Problem occur during deleting the patient.";
    }

    public function searchPatient($ID, $searchKey, $db = '_pdo2')
    {
        //according to ui/ux design it requires only these rows
        $sql = "select patientID, name, gender from patients where {$searchKey} LIKE '%{$ID}%'";
        if ($values = $this->_db->query($db, $sql)->results()) return $values;
        else echo "Patient Records not found, please register.";
    }


    // * Appointment Functionality Begins here 

    public function makeAppointment($fields, $db = '_pdo2')
    {
        if ($this->_db->insert($db, 'appointment', $fields)) return true;
        else return false;
    }

    public function listAllAppointment($db = '_pdo2')
    {
        $sql = 'select * from appointment';
        if ($values = $this->_db->query($db, $sql)->results()) return $values;
        else echo "There is no appointment to show";
    }

    public function listCustomeAppointment($from, $to, $db = '_pdo2')
    {
        $sql = "SELECT * FROM appointment WHERE date BETWEEN ? AND ?";

        if ($values = $this->_db->query($db, $sql, array($from, $to))->results()) {
            if (!empty($values)) {
                foreach ($values as $val) {
                    $val->status = deescape($val->status);
                    $val->patientName = deescape($this->getPatientById($val->patientID)->name);
                    $val->doctorName = deescape($this->getDoctorByID($val->doctorID)->name);
                }
                echo json_encode($values);
            }
        } else "something went wrong listing custom Appointments";
    }

    public function listTodaysAppointment($status)
    {
        $sql = "SELECT * FROM appointment WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW()) AND DAY(date) = DAY(NOW()) AND status = ?";

        if ($values = $this->_db->query('_pdo2', $sql, array(escape($status)))->results()) {
            foreach ($values as $val) {
                $val->status = deescape($val->status);
                $val->patientName = deescape($this->getPatientById($val->patientID)->name);
                $val->doctorName = deescape($this->getDoctorByID($val->doctorID)->name);
            }
            echo json_encode($values);
        } else echo json_encode(array('status' => "error"));
    }

    public function listThisWeekAppointments($status)
    {
        $sql = "SELECT * FROM appointment WHERE WEEKOFYEAR(date) = WEEKOFYEAR(NOW()) AND YEAR(date) = YEAR(now()) AND status = ?";

        if ($values = $this->_db->query('_pdo2', $sql, array(escape($status)))->results()) {
            foreach ($values as $val) {
                $val->status = deescape($val->status);
                $val->patientName = deescape($this->getPatientById($val->patientID)->name);
                $val->doctorName = deescape($this->getDoctorByID($val->doctorID)->name);
            }
            echo json_encode($values);
        } else "There is no pending Appointment";
    }

    public function listThisMonthAppointments($status)
    {
        $sql = "SELECT * FROM appointment WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) AND status = ?";

        if ($values = $this->_db->query('_pdo2', $sql, array(escape($status)))->results()) {
            foreach ($values as $val) {
                $val->status = deescape($val->status);
                $val->patientName = deescape($this->getPatientById($val->patientID)->name);
                $val->doctorName = deescape($this->getDoctorByID($val->doctorID)->name);
            }
            echo json_encode($values);
        } else "There is no pending Appointment";
    }

    public function listUpcomingAppointments($status = 'Awaiting', $db = '_pdo2')
    {
        if ($values = $this->_db->get($db, 'appointment', array('status', '=', escape($status)))->results()) {
            foreach ($values as $val) {
                $val->status = deescape($val->status);
                $val->patientName = deescape($this->getPatientById($val->patientID)->name);
                $val->doctorName = deescape($this->getDoctorByID($val->doctorID)->name);
            }
            echo json_encode($values);
        } else "There is no pending Appointment";
    }

    public function changeAppointmentStatus($condition_Value, $fields, $db = '_pdo2')
    {
        if ($this->_db->update('appointment', 'appointmentID', $condition_Value, $fields, $db)) return true;
        else return false;
    }
    public function deleteAppointment($condition_Value, $db = '_pdo2')
    {
        if ($this->_db->delete($db, 'appointment', array('appointmentID', '=', $condition_Value))) return true;
        else return false;
    }

    public function getDoctorName($id, $db = '_pdo2')
    {
        $sql = "select name from doctor where doctorID = {$id}";
        if ($value = $this->_db->query($db, $sql)->first()) return $value;
        else echo 'Doctor Name not found';
    }

    // please take note doctors table reside into clinic DB
    public function getAllDoctorID()
    {
        $sql = "SELECT doctorID FROM doctors";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option value=''></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else return false;
    }

    public function getPatientName($id, $db = '_pd02')
    {
        $sql = "SELECT name FROM patients WHERE patientID = ?";
        if ($value = $this->_db->query($db, $sql, array($id))->first()) return $value;
        else echo 'Patient Name not found';
    }

    // created by Leong
    public function getMedicalHistory($val)
    {
        if ($data = $this->_db->get('_pdo2', 'medical_history', array('patientID', '=', $val))) return $data->first();
        else 'Patient ID not found in the Database.';
    }

    // created by Leong
    // leong please take doctors table is now inside the _pdo2
    public function getDoctorByID($val, $db = '_pdo2')
    {
        $sql = "SELECT * FROM doctors WHERE doctorID = ?";
        if ($value = $this->_db->query($db, $sql, array($val))->first()) return $value;
        else echo 'Doctor ID not found';
    }

    // created by Yeasin

    public function listTodaysMedicalCerts()
    {
        $sql = 'SELECT M.startingDate, P.patientID, P.name, M.receiptNo 
        FROM medical_certificate M 
        JOIN diagnosis_report R ON R.receiptNo = M.receiptNo 
        JOIN patients P ON P.patientID = R.patientID 
        WHERE YEAR(startingDate) = YEAR(NOW()) AND MONTH(startingDate) = MONTH(NOW()) AND DAY(startingDate) = DAY(NOW())';

        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else echo json_encode(array('status' => "failed"));
    }

    public function listThisWeeksMedicalCerts()
    {
        $sql = 'SELECT M.startingDate, P.patientID, P.name, M.receiptNo 
        FROM medical_certificate M 
        JOIN diagnosis_report R ON R.receiptNo = M.receiptNo 
        JOIN patients P ON P.patientID = R.patientID 
        WHERE WEEKOFYEAR(startingDate) = WEEKOFYEAR(NOW()) AND YEAR(startingDate) = YEAR(now())';

        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else echo json_encode(array('status' => "failed"));
    }

    public function listThisMonthsMedicalCerts()
    {
        $sql = 'SELECT M.startingDate, P.patientID, P.name, M.receiptNo 
        FROM medical_certificate M 
        JOIN diagnosis_report R ON R.receiptNo = M.receiptNo 
        JOIN patients P ON P.patientID = R.patientID 
        WHERE YEAR(startingDate) = YEAR(NOW()) AND MONTH(startingDate)=MONTH(NOW())';

        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else echo json_encode(array('status' => "failed"));
    }

    // created by Leong
    public function listAllMedCert()
    {
        $sql = 'SELECT M.startingDate, P.patientID, P.name, M.receiptNo 
        FROM medical_certificate M 
        JOIN diagnosis_report R ON R.receiptNo = M.receiptNo 
        JOIN patients P ON P.patientID = R.patientID';

        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else echo json_encode(array("status" => "failed"));
    }

    // created by Leong
    public function searchMedCert($val, $searchKey)
    {
        // search via P.patientID, P.name, M.receiptNo
        if ($searchKey == 'P.name')
            $val = bin2hex($val);

        $sql = "SELECT M.startingDate, P.patientID, P.name, M.receiptNo 
                FROM medical_certificate M 
                JOIN diagnosis_report R ON R.receiptNo = M.receiptNo 
                JOIN patients P ON P.patientID = R.patientID 
                WHERE {$searchKey} LIKE ?";

        if ($values = $this->_db->query('_pdo2', $sql, array("%{$val}%"))->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else echo json_encode(array("status" => "failed"));
    }

    // created by Leong
    public function getAvailableReceiptNo()
    {
        $sql = "SELECT R.receiptNo FROM diagnosis_report R LEFT JOIN medical_certificate M ON R.receiptNo = M.receiptNo WHERE M.receiptNo IS NULL";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option value=''></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else return false;
    }

    // created by Leong
    public function getAllReceiptNo()
    {
        $sql = "SELECT receiptNo FROM diagnosis_report limit 10";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option value=''></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else return false;
    }

    // created by Leong
    public function getMedCertByReceiptNo($val)
    {
        $sql = "SELECT M.startingDate, M.endingDate, M.reason, P.patientID, P.name, M.receiptNo, R.doctorID
                FROM medical_certificate M 
                JOIN diagnosis_report R ON R.receiptNo = M.receiptNo 
                JOIN patients P ON P.patientID = R.patientID WHERE M.receiptNo = ? ";

        if ($values = $this->_db->query('_pdo2', $sql, array($val))->first()) {
            $values->name = deescape($values->name);
            $values->reason = deescape($values->reason);
            echo json_encode($values);
        } else echo json_encode(array("status" => "failed"));
    }

    // created by Leong 
    public function editMedCertByReceiptNo($val)
    {
        $user = new User();
        $clinicID =  $user->data()->clinicID;

        $sql = "SELECT R.receiptNo, P.patientID, P.NRIC, M.startingDate, M.endingDate, M.reason, P.name AS PatientName, D.doctorID, D.name AS DoctorName
                FROM {$clinicID}.diagnosis_report R 
                JOIN {$clinicID}.patients P ON R.patientID = P.patientID 
                JOIN {$clinicID}.medical_certificate M ON M.receiptNo = R.receiptNo 
                JOIN smart_clinic.doctor D ON D.doctorID = R.doctorID 
                WHERE M.receiptNo = ? ";

        if ($values = $this->_db->query('_pdo2', $sql, array($val))->first()) return $values;
        else echo "There is no medical certificate to show";
    }

    // created by Leong
    public function getMedCertByCondition($startID, $endID, $startDate, $endDate, $db = '_pdo2')
    {
        $condition = " WHERE 1=1 ";
        $conditional_array = array();

        if (!empty($startID) && !empty($endID)) {
            $condition .= " and P.patientID between ? and ? ";
            array_push($conditional_array, $startID, $endID);
        }

        if (!empty($startDate) && !empty($endDate)) {
            $condition .= " and M.startingDate between ? and ? ";
            array_push($conditional_array, $startDate, $endDate);
        }

        $sql = "SELECT M.startingDate, P.patientID, P.name, M.receiptNo 
                FROM medical_certificate M 
                JOIN diagnosis_report R ON R.receiptNo = M.receiptNo 
                JOIN patients P ON P.patientID = R.patientID {$condition}";

        if ($values = $this->_db->query($db, $sql, $conditional_array)->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else echo json_encode(array("status" => "failed"));
    }

    // created by Leong
    public function createMedCert($field)
    {
        if ($this->_db->insert('_pdo2', 'medical_certificate', $field)) return true;
        else return false;
    }

    // created by Leong
    public function editMedCert($condition_Value, $fields)
    {
        echo $this->_db->update('medical_certificate', 'receiptNo', $condition_Value, $fields, '_pdo2');
    }

    // created by Leong
    public function deleteMedCert($condition_Value, $db = '_pdo2')
    {
        if ($this->_db->delete($db, 'medical_certificate', array('receiptNo', '=', $condition_Value))) return true;
        else return false;
    }

    //Functionalies for expense module added by yeasin 
    //date 80/05/2020
    //all the functions are validated
    public function addAccountCode($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'account', $field))
            echo "A problem occur while adding the account code.";
        else
            echo "New Account name added successfully.";
    }

    public function getAllAccountCode()
    {
        $sql = "SELECT accountCode FROM account";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option value=''></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value='{$data}'>{$data}</option>";
                }
            }
        } else return false;
    }

    public function getAccountName($code)
    {
        if ($data = $this->_db->get('_pdo2', 'account', array('accountCode', '=', $code))) return $data->first()->name;
        else 'Account Code not found in the Database.';
    }

    public function createExpense($field, $db = '_pdo2')
    {
        if ($this->_db->insert($db, 'expenses', $field)) return true;
        else return false;
    }

    public function editExpenses($condition_Value, $fields, $db = '_pdo2')
    {
        if ($this->_db->update('expenses', 'voucherNo', $condition_Value, $fields, $db)) return true;
        else return false;
    }

    public function deleteExpenses($condition_Value, $db = '_pdo2')
    {
        if ($this->_db->delete($db, 'expenses', array('voucherNo', '=', $condition_Value))) return true;
        else return false;
    }

    public function getExpenseInfo($id, $db = '_pdo2')
    {
        if ($data = $this->_db->get($db, 'expenses', array('voucherNo', '=', $id))) return $data->first();
        else 'Voucher Number not found in the Database.';
    }

    public function showAllExpenses($db = '_pdo2')
    {
        $sql = 'select E.date, E.accountCode, A.name, E.voucherNo, E.ammount from expenses E join account A on E.accountCode = A.accountCode';
        if ($values = $this->_db->query($db, $sql)->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else {
            $data = array("status" => "failed");
            echo json_encode($data);
        }
    }

    public function searchExpense($ID, $searchKey, $db = '_pdo2')
    {
        $sql = "select E.date, E.accountCode, A.name, E.voucherNo, E.ammount from expenses E join account A on E.accountCode = A.accountCode where E.{$searchKey} LIKE '%{$ID}%'";
        if ($values = $this->_db->query($db, $sql)->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else {
            $data = array("status" => "failed");
            echo json_encode($data);
        }
    }


    public function getExpenseByCondition($startDate, $endDate, $db = '_pdo2')
    {
        $condition = " WHERE 1=1 ";
        // if (!empty($startID) && !empty($endID))
        //     $condition .= ' and E.accountCode between "' . $startID . '" and "' . $endID . '"';

        if (!empty($startDate) && !empty($endDate))
            $condition .= ' and E.date between "' . $startDate . '" and "' . $endDate . '"';

        $sql = "select E.date, E.accountCode, A.name, E.voucherNo, E.ammount from expenses E join account A on E.accountCode = A.accountCode {$condition}";

        if ($values = $this->_db->query($db, $sql)->results()) if ($values = $this->_db->query($db, $sql)->results()) {
            foreach ($values as $val) $val->name = deescape($val->name);
            echo json_encode($values);
        } else {
            $data = array("status" => "failed");
            echo json_encode($data);
        }
    }

    //yeasin 
    public function getAllPatientID()
    {
        $sql = "SELECT patientID FROM patients";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option value=''></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else echo "<option value='null'>please add patients</option>";
    }

    //Yeasin => This function will add doctors in the DB
    public function addDoctor($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'doctors', $field))
            echo "A problem occur while creating the Doctor.";
    }

    //Yeasin => This function will delete doctors in the DB
    public function deleteDoctor($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'doctors', array('doctorID', '=', $condition_Value)))
            echo "A Problem occur during deleting the Doctor.";
    }

    //Yeasin => This function will Edit doctors in the DB
    public function editDoctor($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('doctors', 'doctorID', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the doctors.";
    }

    // yeasin => this function will show a list od doctors and their name according to the GUI 
    // ##validated
    public function showAllDoctors($db = '_pdo2')
    {
        // remember need to deescape the doctor name while use in production
        $sql = 'select doctorID, name from doctors';
        if ($values = $this->_db->query($db, $sql)->results()) return $values;
        else echo "Something went wrong while showing the doctors.";
    }

    // yeasin => This function will add the symptoms
    public function addSymptoms($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'symptoms', $field))
            echo "A problem occur while creating the symptoms.";
    }

    // yeasin => This function will add the Diagnosis
    public function addDiagnosis($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'diagnosis', $field))
            echo "A problem occur while creating the diagnosis.";
    }

    // yeasin => This function will add the treatment
    public function addTreatments($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'treatment', $field))
            echo "A problem occur while creating the treatment.";
    }

    // yeasin => This function will add the allergy
    public function addAllergies($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'allergy', $field))
            echo "A problem occur while creating the allergy.";
    }

    //Yeasin => This function will delete symptoms in the DB
    public function deleteSymptoms($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'symptoms', array('name', '=', $condition_Value)))
            echo "A Problem occur during deleting the symptoms.";
    }

    //Yeasin => This function will delete diagnosis in the DB
    public function deleteDiagnosis($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'diagnosis', array('name', '=', $condition_Value)))
            echo "A Problem occur during deleting the diagnosis.";
    }

    //Yeasin => This function will delete treatment in the DB
    public function deleteTreatment($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'treatment', array('name', '=', $condition_Value)))
            echo "A Problem occur during deleting the treatment.";
    }

    //Yeasin => This function will delete allergy in the DB
    public function deleteAllergy($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'allergy', array('name', '=', $condition_Value)))
            echo "A Problem occur during deleting the allergy.";
    }

    //Yeasin => This function will Edit symptoms in the DB
    public function editSymptoms($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('symptoms', 'name', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the symptoms.";
    }

    //Yeasin => This function will Edit diagnosis in the DB
    public function editDiagnosis($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('diagnosis', 'name', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the diagnosis.";
    }

    //Yeasin => This function will Edit treatment in the DB
    public function editTreatment($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('treatment', 'name', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the treatment.";
    }

    //Yeasin => This function will Edit allergy in the DB
    public function editAllergy($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('allergy', 'name', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the allergy.";
    }

    // Yeasin => This function will edit the account code 
    public function editAccountCode($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('account', 'accountCode', $condition_Value, $fields, $db))
            echo "A problem occur while edititng the account code.";
        else echo "Account name edited successfully.";
    }

    //Yeasin => This function will delete accountcode in the DB
    public function deleteAccountCode($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'account', array('accountCode', '=', $condition_Value)))
            echo "A Problem occur during deleting the allergy.";
        else echo "Account name deleted successfully.";
    }

    // yeasin => this function will show a list od doctors and their name according to the GUI 
    // *##validated
    public function showAllAccounts($db = '_pdo2')
    {
        // remember need to deescape the account name while use in production
        $sql = 'select * from account';
        if ($values = $this->_db->query($db, $sql)->results()) return $values;
        else echo "Something went wrong while showing the accounts.";
    }

    //Yeasin => This function will add vendors in the DB
    public function addVendor($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'vendors', $field))
            echo "A problem occur while creating the vendors.";
    }

    //Yeasin => This function will delete vendors in the DB
    public function deleteVendor($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'vendors', array('vendorCode', '=', $condition_Value)))
            echo "A Problem occur during deleting the Doctor.";
    }

    //Yeasin => This function will Edit vendors in the DB
    public function editVendor($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('vendors', 'vendorCode', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the vendors.";
    }

    // Yeasin => This function will show all the vendor code from DB
    public function getAllVendorCodes()
    {
        $sql = "SELECT vendorCode FROM vendors";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option value=''></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else echo "<option value='null'>please add Vendors</option>";
    }

    // Yeasin => This function will get the vendors information 
    public function getVendorByID($val, $db = '_pdo2')
    {
        $sql = "SELECT * FROM vendors WHERE vendorCode = ?";
        if ($value = $this->_db->query($db, $sql, array($val))->first()) return $value;
        else echo 'Vendor Code not found';
    }


    // yeasin => this function will show a list of vendors and their name according to the GUI 
    // *##validated
    public function showAllVendors($db = '_pdo2')
    {
        // remember need to deescape the account name while use in production
        $sql = 'select vendorCode, name from vendors';
        if ($values = $this->_db->query($db, $sql)->results()) return $values;
        else echo "Something went wrong while showing the vendors.";
    }


    //Yeasin => This function will add medicines in the DB
    public function addMedicine($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'medicine', $field))
            echo "A problem occur while creating the medicine.";
    }

    //Yeasin => This function will delete medicine in the DB
    public function deleteMedicine($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'medicine', array('itemCode', '=', $condition_Value)))
            echo "A Problem occur during deleting the medicine.";
    }

    //Yeasin => This function will Edit medicine in the DB
    public function editMedicine($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('medicine', 'itemCode', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the medicine.";
    }

    // Yeasin => This function will show all the medicine code from DB
    public function getAllMedicineCodes()
    {
        $sql = "SELECT itemCode FROM medicine";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option selected disabled hidden></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else echo "<option value='null'>please add Medicine</option>";
    }

    // Yeasin => This function will get the medicine information 
    public function getMedicineByID($val, $db = '_pdo2')
    {
        $sql = "SELECT * FROM medicine WHERE itemCode = ?";
        if ($value = $this->_db->query($db, $sql, array($val))->first()) return $value;
        else echo 'Medicine Code not found';
    }

    public function searchMedicineByCond($val, $condVal, $fields = '*', $db = '_pdo2')
    {
        $sql = "SELECT {$fields} FROM medicine WHERE {$condVal} = ?";
        if ($value = $this->_db->query($db, $sql, array($val))->first()) return $value;
        else echo 'Medicine not found';
    }


    // yeasin => this function will show a list of medicine and their name according to the GUI 
    // *##validated
    public function showAllMedicines($db = '_pdo2')
    {
        // remember need to deescape the medicine name while use in production
        $sql = 'select itemCode, name from medicine';
        if ($values = $this->_db->query($db, $sql)->results()) return $values;
        else echo "Something went wrong while showing the medicine.";
    }


    //Yeasin => This function will add inventory in the DB
    public function addInventory($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'inventory', $field))
            echo "A problem occur while creating the inventory.";
        return true;
    }

    //Yeasin => This function will delete inventory in the DB
    public function deleteInventory($condition_Value, $db = '_pdo2')
    {
        if (!$this->_db->delete($db, 'inventory', array('inventoryID', '=', $condition_Value)))
            echo "A Problem occur during deleting the inventory.";
        return true;
    }

    //Yeasin => This function will Edit inventory in the DB
    public function editInventory($condition_Value, $fields, $db = '_pdo2')
    {
        if (!$this->_db->update('inventory', 'inventoryID', $condition_Value, $fields, $db))
            echo "A Problem occur during editing the inventory.";
        return true;
    }

    // Yeasin => This function will get the inventory information 
    public function getInventoryByID($val, $db = '_pdo2')
    {
        $sql = "SELECT E.*, A.name FROM inventory E join medicine A on E.itemCode = A.itemCode WHERE inventoryID = ?";
        if ($value = $this->_db->query($db, $sql, array($val))->first()) return $value;
        else echo 'Inventory ID not found';
    }

    // Yeasin => This function will show all the Inventory ID from DB
    public function getAllInventoryIDs()
    {
        $sql = "SELECT inventoryID FROM inventory";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option value=''></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else echo "<option value='null'>please add Inventory ID</option>";
    }

    // Yeasin => This function will search an inventory item
    public function searchInventory($value, $searchKey, $db = '_pdo2')
    {
        $sql = "select E.inventoryID, E.itemCode, A.name, E.expiry, E.quantity from inventory E join medicine A on E.itemCode = A.itemCode where A.{$searchKey} LIKE '%{$value}%'";
        if ($values = $this->_db->query($db, $sql)->results()) {
            if (!empty($values)) {
                foreach ($values as $val) {
                    $val->name = deescape($val->name);
                }
                echo json_encode($values);
            }
        } else {
            echo json_encode("No inventory found.");
        }
    }

    // Yeasin => This function will search an inventory item by barcode
    public function searchInventoryByBarcode($value, $db = '_pdo2')
    {
        $value = escape($value);
        $sqltmp = "select itemCode from medicine where barcode LIKE '%{$value}%'";
        if ($itemCode = $this->_db->query($db, $sqltmp)->first()) return print_r($itemCode);
        else echo "Something went wrong while getting the barcode.";
        $sql = "select E.itemCode, A.name, E.expiry, E.quantity from inventory E join medicine A on E.itemCode = A.itemCode where itemCode LIKE '%{$itemCode}%'";
        if ($values = $this->_db->query($db, $sql)->first()) return print_r($values);
        else echo "Something went wrong while showing the Inventory.";
    }


    // Yeasin => This function will create a purchase order 
    public function addPurchaseOrder($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'orders', $field))
            print_r("A problem occur while creating the Purchase Order.");
    }

    // Yeasin => This function will insert a purchase order's Items 
    public function addOrderedItem($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'ordereditem', $field))
            print_r("A problem occur while creating the ordereditem.");
    }
    // inventory module functions goes here 


    // Yeasin => This function will insert a diagnosis_report 
    public function addDiagnosisReport($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'diagnosis_report', $field))
            print_r("A problem occur while creating the diagnosis_report.");
    }

    //Yeasin => This function will delete diagnosis_report in the DB
    public function deleteDiagnosisReport($condition_Value, $db = '_pdo2')
    {
        $sql = "SELECT report FROM diagnosis_report WHERE receiptNo = ?";
        if ($fileLocation = $this->_db->query($db, $sql, array($condition_Value))->first()) {
            // first we are getting the file from DB
            $fileLocation = deescape(json_decode(json_encode($fileLocation), true)['report']);
            // then deleting both the files and the DB records
            if (unlink($fileLocation)) {
                if (!$this->_db->delete($db, 'diagnosis_report', array('receiptNo', '=', $condition_Value)))
                    echo "A Problem occur during deleting the diagnosis_report.";
            } else echo 'unable to delete the file';
        } else echo 'Unable to get the Deleted file from DB';
    }

    // this function will return a single diagnositc report 
    public function getDiagnosisReportByID($val, $db = '_pdo2')
    {
        $sql = "SELECT * FROM diagnosis_report WHERE receiptNo = ?";
        if ($value = $this->_db->query($db, $sql, array($val))->first()) return $value;
        else echo 'diagnosis_report not found';
    }

    // this function will helps to keep track on the medicines, which patients takes which mediicnes
    public function addMedicineTracker($field, $db = '_pdo2')
    {
        if (!$this->_db->insert($db, 'track_medicine', $field))
            print_r("A problem occur while creating the track_medicine.");
    }



    // ****billing module functionalities 
    // this function will get all the reciept no from the Diagonastic report table
    public function getAllRecipetNo()
    {
        $sqlA = "SELECT receiptNo FROM diagnosis_report";
        if ($valuesA = $this->_db->query('_pdo2', $sqlA)->results()) {

            // $valuesA = json_decode(json_encode($valuesA), true);
            foreach ($valuesA as $a) $arrayA[] = $a->receiptNo;

            $sqlB = "SELECT receiptNo FROM billing";
            if ($valuesB = $this->_db->query('_pdo2', $sqlB)->results()) {

                foreach ($valuesB as $a) $arrayB[] = $a->receiptNo;
                $receiptNo = array_diff($arrayA, $arrayB);

                echo "<option value=''></option>";
                foreach ($receiptNo as $rec) echo "<option value={$rec}>{$rec}</option>";
            }
        } else echo "<option value='null'>please add receiptNo</option>";
    }

    // Yeasin => This function will insert a billing 
    public function addBilling($field, $db = '_pdo2')
    {
        if ($this->_db->insert($db, 'billing', $field)) return true;
        else return false;
    }

    //Yeasin => This function will delete billing in the DB
    public function deleteBilling($condition_Value, $db = '_pdo2')
    {
        if ($this->_db->delete($db, 'billing', array('receiptNo', '=', $condition_Value))) return true;
        return false;
    }

    // this function will get all the billing ids from the db
    public function getAllBillingIds()
    {
        $sql = "SELECT billingID FROM billing";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            echo "<option value=''></option>";
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else echo "<option value='null'>please add billing</option>";
    }

    // this function will get the bills 
    public function getBillingByRecieptNo($val, $db = '_pdo2')
    {
        $sql = "SELECT * FROM billing WHERE receiptNo = ?";
        if ($value = $this->_db->query($db, $sql, array($val))->first()) return $value;
        else echo 'Billing ID Code not found';
    }

    //Yeasin => This function will Edit billing in the DB
    public function editBilling($condition_Value, $fields, $db = '_pdo2')
    {
        if ($this->_db->update('billing', 'receiptNo', $condition_Value, $fields, $db)) return true;
        return false;
    }

    // this function will get all the billings by cond
    public function getBillingByCondition($startID = null, $endID = null, $startDate = null, $endDate = null, $db = '_pdo2')
    {
        $condition = " WHERE 1=1 ";
        $conditional_array = array();

        //** remember we need to deescape the value before use */

        if (!empty($startID) && !empty($endID)) {
            $condition .= " and P.patientID between ? and ? ";
            array_push($conditional_array, $startID, $endID);
        }

        if (!empty($startDate) && !empty($endDate)) {
            $condition .= " and B.date between ? and ? ";
            array_push($conditional_array, $startDate, $endDate);
        }

        $sql = "SELECT B.date, P.patientID, P.name, B.receiptNo, B.totalAmount, B.status
                FROM billing B 
                JOIN diagnosis_report R ON R.receiptNo = B.receiptNo
                JOIN patients P ON P.patientID = R.patientID {$condition}";

        if ($values = $this->_db->query($db, $sql, $conditional_array)->results()) {
            foreach ($values as $val) {
                $val->name = deescape($val->name);
                $val->status = deescape($val->status);
            }
            echo json_encode($values);
        } else {
            $data = array("status" => "failed");
            echo json_encode($data);
        }
    }

    public function listTodaysBillings($status)
    {
        // $sql = "SELECT * FROM appointment WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW()) AND DAY(date) = DAY(NOW()) AND status = ?";
        $condition = " WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW()) AND DAY(date) = DAY(NOW()) AND status = ?";

        $sql = "SELECT B.date, P.patientID, P.name, B.receiptNo, B.totalAmount, B.status
        FROM billing B 
        JOIN diagnosis_report R ON R.receiptNo = B.receiptNo
        JOIN patients P ON P.patientID = R.patientID {$condition}";

        if ($values = $this->_db->query('_pdo2', $sql, array(escape($status)))->results()) {
            foreach ($values as $val) {
                $val->name = deescape($val->name);
                $val->status = deescape($val->status);
            }
            echo json_encode($values);
        } else echo json_encode(array('status' => "error"));
    }

    public function listThisWeekBillings($status)
    {
        // $sql = "SELECT * FROM appointment WHERE WEEKOFYEAR(date) = WEEKOFYEAR(NOW()) AND YEAR(date) = YEAR(now()) AND status = ?";
        $condition = " WHERE WEEKOFYEAR(date) = WEEKOFYEAR(NOW()) AND YEAR(date) = YEAR(now()) AND status = ?";

        $sql = "SELECT B.date, P.patientID, P.name, B.receiptNo, B.totalAmount, B.status
        FROM billing B 
        JOIN diagnosis_report R ON R.receiptNo = B.receiptNo
        JOIN patients P ON P.patientID = R.patientID {$condition}";

        if ($values = $this->_db->query('_pdo2', $sql, array(escape($status)))->results()) {
            foreach ($values as $val) {
                $val->name = deescape($val->name);
                $val->status = deescape($val->status);
            }
            echo json_encode($values);
        } else echo json_encode(array('status' => "error"));
    }

    public function listThisMonthBillings($status)
    {
        $sql = "SELECT * FROM appointment WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) AND status = ?";

        $condition = " WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) AND status = ?";

        $sql = "SELECT B.date, P.patientID, P.name, B.receiptNo, B.totalAmount, B.status
        FROM billing B 
        JOIN diagnosis_report R ON R.receiptNo = B.receiptNo
        JOIN patients P ON P.patientID = R.patientID {$condition}";

        if ($values = $this->_db->query('_pdo2', $sql, array(escape($status)))->results()) {
            foreach ($values as $val) {
                $val->name = deescape($val->name);
                $val->status = deescape($val->status);
            }
            echo json_encode($values);
        } else echo json_encode(array('status' => "error"));
    }



    // **Dashboard Functionalitites 
    // appointment Functionality all functions are validated

    // this function will get all the appoinment in the current week 
    public function getAllAppointmentNumberCurrentWeek()
    {
        $sql = "SELECT count(*) as total FROM appointment WHERE YEARWEEK(date) = YEARWEEK(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // this function will get all the appoinment in the current week 
    public function getAllAppointmentNumberCurrentMonth()
    {
        $sql = "select count(*) as total from appointment where date between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // this function will get all the appoinment in the current week 
    public function getAllAppointmentNumberCurrentYear()
    {
        $sql = "select count(*) as total from appointment where date between DATE_FORMAT(NOW(),'%Y-01-01') and DATE_FORMAT(NOW(),'%Y-12-31')";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // patient functionality for dashbaord
    // patient table need to be modified before use
    // this function will get all the appoinment in the current week 
    public function getAllPatientNumberCurrentWeek()
    {
        $sql = "SELECT count(*) as total FROM patients WHERE YEARWEEK(date) = YEARWEEK(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // this function will get all the appoinment in the current week 
    public function getAllPatientNumberCurrentMonth()
    {
        $sql = "select count(*) as total from patients where date between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // this function will get all the appoinment in the current week 
    public function getAllPatientNumberCurrentYear()
    {
        $sql = "select count(*) as total from patients where date between DATE_FORMAT(NOW(),'%Y-01-01') and DATE_FORMAT(NOW(),'%Y-12-31')";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // Expense functinality 

    // this function will get all the sales in the current week 
    public function getAllExpensesCurrentWeek()
    {
        $sql = "SELECT SUM(ammount) as total FROM expenses WHERE YEARWEEK(date) = YEARWEEK(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // this function will get all the sales in the current week 
    public function getAllExpensesCurrentMonth()
    {
        $sql = "select SUM(ammount) as total from expenses where date between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // this function will get all the sales in the current week 
    public function getAllExpensesCurrentYear()
    {
        $sql = "select SUM(ammount) as total from expenses where date between DATE_FORMAT(NOW(),'%Y-01-01') and DATE_FORMAT(NOW(),'%Y-12-31')";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }


    // Sales functinality 

    // this function will get all the sales in the current week 
    public function getAllSalesCurrentWeek()
    {
        $sql = "SELECT SUM(totalAmount) as total FROM billing WHERE YEARWEEK(date) = YEARWEEK(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // this function will get all the sales in the current week 
    public function getAllSalesCurrentMonth()
    {
        $sql = "select SUM(totalAmount) as total from billing where date between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // this function will get all the sales in the current week 
    public function getAllSalesCurrentYear()
    {
        $sql = "select SUM(totalAmount) as total from billing where date between DATE_FORMAT(NOW(),'%Y-01-01') and DATE_FORMAT(NOW(),'%Y-12-31')";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }


    // This function will get the number of expenses based on individual accountCode
    // which later on will be needed in the Dashboard functionality to calcualte Expense percentages
    public function getNumberOfExpensesWeekly($accountCode)
    {
        $sql = "SELECT count(*) as total FROM expenses WHERE accountCode = ? and YEARWEEK(date) = YEARWEEK(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql, array($accountCode))->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }
    // Monthly
    public function getNumberOfExpensesMonthly($accountCode)
    {
        $sql = "SELECT count(*) as total FROM expenses WHERE accountCode = ? and date between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql, array($accountCode))->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }
    // Yearly
    public function getNumberOfExpensesYearly($accountCode)
    {
        $sql = "SELECT count(*) as total FROM expenses WHERE accountCode = ? and date between DATE_FORMAT(NOW(),'%Y-01-01') and DATE_FORMAT(NOW(),'%Y-12-31')";
        if ($values = $this->_db->query('_pdo2', $sql, array($accountCode))->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }

    // Stock functionality Dashboard 
    // This functionlaity only requires two functions 
    // 1. Get the totoal number of inventory and 2. then get the total number of expiry inventory

    // this function will get the totoal number of inventory  
    public function getAllStocksCurrentWeek()
    {
        $firstdayofweek = strval(date('Y-m-d', strtotime("this week")));
        $sql =  "SELECT count(*) AS total FROM inventory WHERE expiry >= CAST(? AS DATE)";
        if ($values = $this->_db->query('_pdo2', $sql, array($firstdayofweek))->results()) {
            if ($values[0]->total == 0) echo json_encode(array('status' => "not found"));
            else echo json_encode(array('total' => $values[0]->total));
        } else echo json_encode(array('status' => "error"));
    }
    // this function will get the totoal number of expiry inventory  
    public function getAllExpiredStocksCurrentWeek()
    {
        $sql = "SELECT count(*) FROM inventory WHERE expiry between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) return print_r($values);
        else echo "Something went wrong while showing the inventory.";
    }

    // Stock shortge functionality 

    // this function will get the items that will less than 10
    public function getAllStocksLessThanTen()
    {
        // 10 hex value is 3130
        $sql = "SELECT * FROM inventory where quantity < 3130";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) return print_r($values);
        else echo "Something went wrong while showing the inventory.";
    }

    // delivery functionality 

    // this function will lists the current weeks delevery
    public function getCurrentWeekDelivery()
    {
        $sql = "SELECT * FROM orders YEARWEEK(deliveryDate) = YEARWEEK(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) return print_r($values);
        else echo 'Something went wrong while showing the weekly deliveries';
    }
    // this function will lists the current months delevery
    public function getCurrentMonthDelivery()
    {
        $sql = "SELECT * FROM orders WHERE deliveryDate between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) return print_r($values);
        else echo 'Something went wrong while showing the monthly deliveries';
    }



    //inventory functionality
    //YY => this function list all inventory
    public function listAllInventory($db = '_pdo2')
    {
        $sql = 'select E.*, A.name from inventory E join medicine A on E.itemCode = A.itemCode';
        if ($values = $this->_db->query($db, $sql)->results()) {
            if (!empty($values)) {
                foreach ($values as $val) {
                    $val->name = deescape($val->name);
                }
                echo json_encode($values);
            }
        } else echo "There is no inventory to show";
    }

    //YY => this function list all item codes to put in dropdown list
    public function getAllItemCodes($db = '_pdo2')
    {
        $sql = 'select distinct itemCode from inventory';
        if ($values = $this->_db->query($db, $sql)->results()) echo json_encode($values);
        else echo "";
    }

    //YY => this function get inventory by start and end item codes
    public function getCustomInventoryByItemCode($start, $end, $db = '_pdo2')
    {
        if ($start == '') $start = null;
        if ($end == '') $end = null;

        $sql = 'select E.*, A.name from inventory E
                join medicine A on E.itemCode = A.itemCode where 
                (? is null and E.itemCode <= ?) or
                (E.itemCode >= ? and ? is null) or
                (E.itemCode between ? and ?)
                ';
        if ($values = $this->_db->query($db, $sql, array($start, $end, $start, $end, $start, $end))->results()) {
            if (!empty($values)) {
                foreach ($values as $val) {
                    $val->name = deescape($val->name);
                }
                echo json_encode($values);
            }
        } else {
            echo "Something went wrong while showing the Inventory.";
        }
    }


    //YY => this function get purchase order list
    public function listAllPurchaseOrder($db = '_pdo2')
    {
        $sql = 'select o.*, v.name from orders o join vendors v on o.vendorCode = v.vendorCode';
        if ($values = $this->_db->query($db, $sql)->results()) {
            if (!empty($values)) {
                foreach ($values as $val) {
                    $val->name = deescape($val->name);
                }
                echo json_encode($values);
            }
        } else echo "There is no purchase order to show";
    }

    //YY => this function get purchase order by condition
    public function getCustomPurchaseOrder($start, $end, $from, $to, $db = '_pdo2')
    {
        if ($start == '') $start = null;
        if ($end == '') $end = null;
        if ($from == '') $from = null;
        if ($to == '') $to = null;

        if (($start == null && $end == null) || ($from == null && $to == null)) $condition = ' or ';
        else $condition = 'and';

        $sql = 'select O.*, V.name from orders O join vendors V on O.vendorCode = V.vendorCode where
            (
                (? is null and  O.vendorCode <= ?) or
                (O.vendorCode >= ? and ? is null) or
                (O.vendorCode between ? and ?)
            ) ' . $condition . '
            (
                (? is null and  O.deliveryDate <= ?) or
                (O.deliveryDate >= ? and ? is null) or
                (O.deliveryDate between ? and ?)
            )
            ';

        if ($values = $this->_db->query($db, $sql, array($start, $end, $start, $end, $start, $end, $from, $to, $from, $to, $from, $to))->results()) {
            if (!empty($values)) {
                foreach ($values as $val) {
                    $val->name = deescape($val->name);
                }
                echo json_encode($values);
            }
        } else echo json_encode("There is no purchase order to show.");
    }

    // **** End of Dashbaord functionality
}
