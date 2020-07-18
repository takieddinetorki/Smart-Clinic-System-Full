<?php 

class Doctor{
    private $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance();
        $user = new User();
        $this->_db->setConnection($user->data()->clinicID);
    }

//this will echo the options so must be put inside the select 
    public function getAllSymptoms($db='_pdo2'){
        $sql = 'select name from symptoms';
        if($values = $this->_db->query($db,$sql)->results()){
            foreach($values as $value) {
                foreach ($value as $data) {
                    $data = deescape($data);
                    echo "<option value='{$data}'>{$data}</option>";
                }
            }
        }
        else echo 'Please add Symptopms in Symptoms Table';
    }

//this will echo the options so must be put inside the select 
    public function getAllTreatments($db='_pdo2'){
        $sql = 'select name from treatment';
        if($values = $this->_db->query($db,$sql)->results()){
            foreach($values as $value) {
                foreach ($value as $data) {
                    $data = deescape($data);
                    echo "<option value='{$data}'>{$data}</option>";
                }
            }
        }
        else echo 'Please add treatment in treatment Table';
    }

//this will echo the options so must be put inside the select 
    public function getAllAlergies($db='_pdo2'){
        $sql = 'select name from allergy';
        if($values = $this->_db->query($db,$sql)->results()){
            foreach($values as $value) {
                foreach ($value as $data) {
                    $data = deescape($data);
                    echo "<option value='{$data}'>{$data}</option>";
                }
            }
        }
        else echo 'Please add allergy in allergy Table';
    }

//this will return the result array need to procces the data first before putting inside select 
    public function getAllDiagnosis($db='_pdo2'){
        $sql = 'select name from diagnosis';
        if($values = $this->_db->query($db,$sql)->results()){
            foreach($values as $value) {
                foreach ($value as $data) {
                    $data = deescape($data);
                    echo "<option value='{$data}'>{$data}</option>";
                }
            }
        }
        else echo 'Please add diagnosis in diagnosis Table';
    }
    
//this will return the result array need to procces the data first before putting inside select 
    public function getAllMedicines($db = '_pdo2'){
        $sql = 'select name from medicine';
        if($values = $this->_db->query($db,$sql)->results()){
            foreach($values as $value) {
                foreach ($value as $data) {
                    $data = deescape($data);
                    echo "<option value='{$data}'>{$data}</option>";
                }
            }
        }
        else echo 'Please add medicine in medicine Table';
    }

    public function generateReport(){
        //sara do this function
    }
}
?>