<?php
/**
 * Code Written by: <Mohammad Yeasin Al Fahad>
 * File Name: <Clinic.php>
 * Class Name: <Clinic>
 * Purpose of the file: <Upon registering a for clinic all the table will be generated from this file>
 * Functions included: <List of functions included>
 **/
class Clinic
{
    private $_db,
            $_sessionName;

    public function __construct() {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        if (Session::exists($this->_sessionName)) {
            $this->_sessionValue = Session::get($this->_sessionName);
        }
        
    }

    // Inseart the clinicsDB into 
    public function createClinic($db, $table, $fields = array()) {
        if (!$this->_db->insert($db,$table, $fields)) {
            throw new Exception("Sorry! There was a problem creating your account please try again later or contact us!");
        }
    }

    // creat a Database for the clinic registered
    public function setDB($dbname)
    {
        $this->_db->createDB('_pdo', $dbname);
        $this->createTables();
    }
    
    public function createTables(){
        // these are the table sql attributes that we will need during the table creatation
        $allergy = array(
            array('allergyID','int(4)','PRIMARY KEY','AUTO_INCREMENT'),
            array('name','varchar(200)','NOT NULL')
        );
        $treatment = array(
            array('ID', 'int(4)', 'PRIMARY KEY','AUTO_INCREMENT'),
            array('name', 'varchar(200)')
        );
        $diagnosis = array(
            array('diagnosisID','int(4)','PRIMARY KEY','AUTO_INCREMENT'),
            array('name','varchar(200)','NOT NULL')
        );
        $symptoms = array(
            array('symptomID','int(4)','PRIMARY KEY','AUTO_INCREMENT'),
            array('name','varchar(200)','NOT NULL')
        );
        $medicine = array(
            array('itemCode','varchar(12)','PRIMARY KEY'),
            array('name','varchar(50)','NOT NULL'),
            array('barcode','varchar(200)','NOT NULL'),
            array('price','float','NOT NULL')
        );
        $appointment = array(
            array('appointmentID','varchar(12)','PRIMARY KEY'), 
            array('date','date','NOT NULL'), 
            array('time','varchar(10)','NOT NULL'), 
            array('status','varchar(50)','NOT NULL'),  
            array('patientID','varchar(12)','NOT NULL'), 
            array('doctorID','varchar(12)','NOT NULL'),
            array('FOREIGN KEY (patientID) REFERENCES patients(patientID)'),
            array('FOREIGN KEY (doctorID) REFERENCES doctors(doctorID)')
        );
        $medical_history = array(
            array('mhID','int(4)','PRIMARY KEY','AUTO_INCREMENT'), 
            array('illness','varchar(50)','DEFAULT NULL'), 
            array('smoking','varchar(50)','DEFAULT NULL'), 
            array('drinking','varchar(50)','DEFAULT NULL'), 
            array('tobacco','varchar(50)','DEFAULT NULL'), 
            array('othersHabit','varchar(50)','DEFAULT NULL'), 
            array('foodAllergies','varchar(50)','DEFAULT NULL'), 
            array('drugAllergies','varchar(50)','DEFAULT NULL'), 
            array('otherAllergies','varchar(50)','DEFAULT NULL'), 
            array('patientID','varchar(12)','NOT NULL'),
            array('doctorID','varchar(12)','NOT NULL'),
            array('FOREIGN KEY (patientID) REFERENCES patients(patientID)'),
            array('FOREIGN KEY (doctorID) REFERENCES doctors(doctorID)'),
        );
        $patients = array(
            array('patientID','varchar(12)','PRIMARY KEY'), 
            array('NRIC','varchar(200)','NOT NULL'), 
            array('dob','date','DEFAULT NULL'), 
            array('date','date','DEFAULT NULL'), 
            array('age','int(10)','DEFAULT NULL'), 
            array('name','varchar(100)','DEFAULT NULL'), 
            array('addressA','varchar(200)','DEFAULT NULL'), 
            array('addressB','varchar(200)','DEFAULT NULL'), 
            array('gender','varchar(10)','DEFAULT NULL'), 
            array('race','varchar(2)','DEFAULT NULL'), 
            array('nationality','varchar(20)','DEFAULT NULL'), 
            array('maritalStatus','varchar(15)','DEFAULT NULL'), 
            array('mobileNo','varchar(50)','DEFAULT NULL'), 
            array('spouseName','varchar(50)','DEFAULT NULL'), 
            array('emergencyContactName','varchar(100)','DEFAULT NULL'), 
            array('emergencyContact','varchar(50)','DEFAULT NULL'), 
            array('relationship','varchar(50)','DEFAULT NULL'),
            array('picture','varchar(200)','DEFAULT NULL')
        );
        $diagnosis_report = array(
            array('receiptNo','varchar(12)','PRIMARY KEY'),
            array('report','varchar(200)','DEFAULT NULL'),
            array('medicalCost','float','DEFAULT NULL'),
            array('doctorID','varchar(12)','NOT NULL'),
            array('patientID','varchar(12)','NOT NULL'),
            array('FOREIGN KEY (patientID) REFERENCES patients(patientID)')
        );
        //created by leong
        $medical_certificate = array(
            array('receiptNo','varchar(12)','PRIMARY KEY'),
            array('startingDate','date','NOT NULL'),
            array('endingDate','date','NOT NULL'),
            array('reason','varchar(200)','DEFAULT NULL'),
            array('FOREIGN KEY (receiptNo) REFERENCES diagnosis_report(receiptNo)')
        );
        $inventory = array(
            array('inventoryID','varchar(12)','PRIMARY KEY'),
            array('quantity','int','NOT NULL'),
            array('expiry','date','NOT NULL'),
            array('itemCode','varchar(12)','NOT NULL'),
            array('FOREIGN KEY (itemCode) REFERENCES medicine(itemCode)')
        );
        $account = array(
            array('accountCode','varchar(12)','PRIMARY KEY'),
            array('name','varchar(50)','NOT NULL')
        );
        $expenses = array(
            array('voucherNo','varchar(12)','PRIMARY KEY'),
            array('date','Date','NOT NULL'),
            array('ammount','float','NOT NULL'),
            array('particulation','varchar(10)','NOT NULL'),
            array('accountCode','varchar(12)','NOT NULL'),
            array('FOREIGN KEY (accountCode) REFERENCES account(accountCode)')
        );
        $vendors = array(
            array('vendorCode','varchar(12)','PRIMARY KEY'),
            array('name','varchar(50)','NOT NULL'),
            array('address','varchar(200)','NOT NULL'),
            array('contactedPerson','varchar(50)','NOT NULL'),
            array('contactNo','varchar(50)','NOT NULL')
        );
        $orders = array(
            array('poNo','varchar(12)','PRIMARY KEY'),
            array('deliveryDate','Date','NOT NULL'),
            array('deliveryAddress','varchar(200)','NOT NULL'),
            array('qutotionNo','varchar(12)','NOT NULL'),
            array('paymentTerm','varchar(20)','NOT NULL'),
            array('contactPerson','varchar(20)','NOT NULL'),
            array('contactNo','varchar(20)','NOT NULL'),
            array('deliveryCharge','float','NOT NULL'),
            array('totalAmmount','float','NOT NULL'),
            array('vendorCode','varchar(12)','NOT NULL'),
            array('FOREIGN KEY (vendorCode) REFERENCES vendors(vendorCode)')
        );
        $orderedItem = array(
            array('oiNo','varchar(12)','PRIMARY KEY'),
            array('quantity','int','NOT NULL'),
            array('price','float','NOT NULL'),
            array('description','varchar(200)','NOT NULL'),
            array('itemCode','varchar(12)','NOT NULL'),
            array('poNo','varchar(12)','NOT NULL'),
            array('FOREIGN KEY (itemCode) REFERENCES medicine(itemCode)'),
            array('FOREIGN KEY (poNo) REFERENCES orders(poNo)')
        );
        $billing = array(
            array('billingID','varchar(12)','PRIMARY KEY'),
            array('date','date','NOT NULL'),
            array('time','time','NOT NULL'),
            array('status','varchar(20)','NOT NULL'),
            array('consultation','float','NOT NULL'),
            array('treatment','float','NOT NULL'),
            array('medication','float','NOT NULL'),
            array('discount','float','NOT NULL'),
            array('totalAmount','float','NOT NULL'),
            array('receiptNo','varchar(12)','NOT NULL'),
            array('FOREIGN KEY (receiptNo) REFERENCES diagnosis_report(receiptNo)')
        );
        $doctors = array(
            array('doctorID','varchar(12)','PRIMARY KEY'),
            array('name','varchar(50)','NOT NULL'),
            array('nric','varchar(50)','NOT NULL'),
            array('gender','varchar(10)','NOT NULL'),
            array('MMCregNo','varchar(50)','NOT NULL'),
            array('contactNo','varchar(12)','NOT NULL'),
            array('picture','varchar(200)','NOT NULL'),
        );
        $backups = array(
            array('backupID','varchar(12)','PRIMARY KEY'),
            array('name','varchar(50)','NOT NULL'),
            array('date','Date','NOT NULL'),
            array('location','varchar(200)','NOT NULL')
        );
        $monthlyReports = array(
            array('reportID','varchar(12)','PRIMARY KEY'),
            array('month','varchar(15)','NOT NULL'),
            array('type','varchar(15)','NOT NULL'),
            array('location','varchar(200)','NOT NULL')
        );
        /** Created by Taki */
        $notifications = array(
            array('notifID','varchar(12)','PRIMARY KEY'),
            array('title','varchar(60)','NOT NULL'),
            array('ownerID','varchar(15)','NOT NULL'),
            array('description','varchar(500)','NOT NULL'),
        );
        //creating tables from DB methods
        //I could use a for lopp for that but I will ended up a 3d array which will be messy
        if(!$this->_db->createTable('_pdo2','patients',$patients)) echo "<br>unable to create Patient Table<br>";
        if(!$this->_db->createTable('_pdo2','doctors',$doctors)) echo "unable to create Doctors Table<br>";
        if(!$this->_db->createTable('_pdo2','medical_history',$medical_history)) echo "unable to create Medical History Table<br>";
        if(!$this->_db->createTable('_pdo2','appointment',$appointment)) echo "unable to create Appointment Table<br>";
        if(!$this->_db->createTable('_pdo2','allergy',$allergy)) echo "unable to create Allergy Table<br>";
        if(!$this->_db->createTable('_pdo2','diagnosis',$diagnosis)) echo "unable to create Diagnosis Table<br>";
        if(!$this->_db->createTable('_pdo2','symptoms',$symptoms)) echo "unable to create Symptoms Table<br>";
        if(!$this->_db->createTable('_pdo2','medicine',$medicine)) echo "unable to create Medicine Table<br>";
        if(!$this->_db->createTable('_pdo2','treatment',$treatment)) echo "unable to create Treatment Table<br>";
        if(!$this->_db->createTable('_pdo2','diagnosis_report',$diagnosis_report)) echo "unable to create Diagnosis Report Table<br>";
        if(!$this->_db->createTable('_pdo2','medical_certificate',$medical_certificate)) echo "unable to create Medical Certificate Table<br>";
        if(!$this->_db->createTable('_pdo2','inventory',$inventory)) echo "unable to create Inventory Table<br>";
        if(!$this->_db->createTable('_pdo2','billing',$billing)) echo "unable to create Billing Table<br>";
        if(!$this->_db->createTable('_pdo2','account',$account)) echo "unable to create Account Table<br>";
        if(!$this->_db->createTable('_pdo2','expenses',$expenses)) echo "unable to create Expense Table<br>";
        if(!$this->_db->createTable('_pdo2','vendors',$vendors)) echo "unable to create Vendors Table<br>";
        if(!$this->_db->createTable('_pdo2','orders',$orders)) echo "unable to create Orders Table<br>";
        if(!$this->_db->createTable('_pdo2','orderedItem',$orderedItem)) echo "unable to create Ordered Item Table<br>";
        if(!$this->_db->createTable('_pdo2','backups',$backups)) echo "unable to create Backups Table<br>";
        if(!$this->_db->createTable('_pdo2','monthlyReports',$monthlyReports)) echo "unable to create Monthly Report Table<br>";
        if(!$this->_db->createTable('_pdo2','notifications',$notifications)) echo "unable to create the notifications Table<br>";
    }
}


?>