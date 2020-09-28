<?php

class Patient
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


    // get All Pateint 
    public function getAllPateints()
    {
        $sql = "SELECT patientID, name, gender FROM patients";

        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            foreach ($values as $val) {
                $val->name = deescape($val->name);
                $val->gender = deescape($val->gender);
            }
            echo json_encode($values);
        } else echo json_encode(array('status' => "error"));
    }

    // get single patients by id or name
    public function searchPatient($val, $searchKey)
    {
        // search via P.patientID, P.name, M.receiptNo
        if ($searchKey == 'name')
            $val = bin2hex($val);

        $sql = "SELECT patientID, name, gender FROM patients WHERE {$searchKey} LIKE ?";

        if ($values = $this->_db->query('_pdo2', $sql, array("%{$val}%"))->results()) {
            foreach ($values as $val) {
                $val->name = deescape($val->name);
                $val->gender = deescape($val->gender);
            }
            echo json_encode($values);
        } else echo json_encode(array('status' => "error"));
    }

    // get pateints by specific ids
    public function getPatientByIds($startVal, $endVal)
    {
        $sql = "SELECT patientID, name, gender FROM patients WHERE patientID BETWEEN ? AND ?";
        if ($values = $this->_db->query('_pdo2', $sql, array($startVal, $endVal))->results()) {
            foreach ($values as $val) {
                $val->name = deescape($val->name);
                $val->gender = deescape($val->gender);
            }
            echo json_encode($values);
        } else echo json_encode(array('status' => "error"));
    }

    // get pateints by specific ids
    public function getEditPatientsVal($val)
    {
        $sql = "SELECT * FROM patients
        INNER JOIN medical_history
        ON patients.patientID=medical_history.patientID WHERE patients.patientID = ?";

        if ($val = $this->_db->query('_pdo2', $sql, array($val))->first()) {
            // we are descaping the value here
            $val->NRIC = deescape($val->NRIC);
            $val->name = deescape($val->name);
            $val->addressA = deescape($val->addressA);
            $val->addressB = deescape($val->addressB);
            $val->age = deescape($val->age);
            $val->gender = deescape($val->gender);
            $val->race = deescape($val->race);
            $val->nationality = deescape($val->nationality);
            $val->maritalStatus = deescape($val->maritalStatus);
            $val->mobileNo = deescape($val->mobileNo);
            $val->spouseName = deescape($val->spouseName);
            $val->emergencyContactName = deescape($val->emergencyContactName);
            $val->emergencyContact = deescape($val->emergencyContact);
            $val->relationship = deescape($val->relationship);
            $val->picture = deescape($val->picture);
            // illness 
            $val->illness = deescape($val->illness);
            $val->smoking = deescape($val->smoking);
            $val->drinking = deescape($val->drinking);
            $val->tobacco = deescape($val->tobacco);
            $val->othersHabit = deescape($val->othersHabit);
            $val->foodAllergies = deescape($val->foodAllergies);
            $val->drugAllergies = deescape($val->drugAllergies);
            $val->otherAllergies = deescape($val->otherAllergies);
            $val->report = deescape($val->report);
            echo json_encode($val);
        } else echo json_encode(array('status' => "error"));
    }
    // get all patinets ID
    public function getAllPatientID()
    {
        $sql = "SELECT patientID FROM patients";
        if ($values = $this->_db->query('_pdo2', $sql)->results()) {
            foreach ($values as $value) {
                foreach ($value as $data) {
                    echo "<option value={$data}>{$data}</option>";
                }
            }
        } else echo "<option value='null'>please add patients</option>";
    }

    // deleting a patient
    public function deletePatient($condition_Value, $db = '_pdo2')
    {
        if ($this->_db->delete($db, 'patients', array('patientID', '=', $condition_Value))) return true;
        else return false;
    }

    // editing a patient 
    public function editPatient($condition_Value, $fields, $db = '_pdo2')
    {
        if ($this->_db->update('patients', 'patientID', $condition_Value, $fields, $db)) return true;
        else return false;
    }

    // editing medical history
    public function editMedicalHistory($condition_Value, $fields, $db = '_pdo2')
    {
        if ($this->_db->update('medical_history', 'patientID', $condition_Value, $fields, $db)) return true;
        else return false;
    }
}
