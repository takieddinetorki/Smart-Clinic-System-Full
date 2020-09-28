<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
            $staff = new Staff();

            $file = $_FILES["file"];
            $ext = explode('.', $file['name']);
            $FileExt = strtolower(end($ext));
            $pid = Input::get('patientID');
            $patientName = Input::get('name');
            $fileDest = "../files/profile_pictures/patients/{$pid}_{$patientName}.{$FileExt}";
            move_uploaded_file($file['tmp_name'], $fileDest);
            $picture = "{$pid}_{$patientName}.{$FileExt}";

            $patientData = array(
                'patientID' => Input::get('patientID'),
                'NRIC' =>  Input::get('NRIC', true),
                'dob' => Input::get('dob'),
                'date' => date("Y-m-d"),
                'age' => Input::get('age', true),
                'name' => Input::get('name', true),
                'addressA' => Input::get('addressA', true),
                'addressB' => Input::get('addressB', true),
                'gender' => Input::get('gender', true),
                'race' => Input::get('race', true),
                'nationality' => Input::get('nationality', true),
                'maritalStatus' => Input::get('maritalStatus', true),
                'mobileNo' => Input::get('mobileNo', true),
                'spouseName' => Input::get('spouse-input', true),
                'emergencyContactName' => Input::get('emergencyContactName', true),
                'emergencyContact' => Input::get('emergencyContact', true),
                'relationship' => Input::get('relationship', true),
                'picture' => escape($picture),
            );

            // As one patent may have multiple illness we are taking all by adding + between 
            // them so that we can retreive later
            $illness = '';
            if ($val = Input::get('Diabetes')) $illness .= "+{$val}";
            if ($val = Input::get('heartPatient')) $illness .= "+{$val}";
            if ($val = Input::get('Migraine')) $illness .= "+{$val}";
            if ($val = Input::get('bloodPressure')) $illness .= "+{$val}";
            if ($val = Input::get('Lungs')) $illness .= "+{$val}";
            if ($val = Input::get('Tubercolosis')) $illness .= "+{$val}";
            if ($val = Input::get('illnessOthers')) {
                $illness .= "+";
                $illness .= Input::get('illnessText');
            }

            $medicalData = array(
                'patientID' => Input::get('patientID'),
                'illness' => escape($illness),
                'smoking' => (Input::get('smoking', true)),
                'drinking' => (Input::get('drink', true)),
                'tobacco' => (Input::get('tobacco', true)),
                'othersHabit' => (Input::get('othersHabit', true)),
                'foodAllergies' => (Input::get('foodAllergiesText', true)),
                'drugAllergies' => (Input::get('drugAllergiesText', true)),
                'otherAllergies' => (Input::get('otherAllergiesText', true)),
                'report' => '',
                'doctorID' => Input::get('doctorID')
            );

            //* please add the log activity accordingly
            if ($staff->createPatient($patientData) && $staff->creatMedicalHistory($medicalData)) {
                // System::logActivity('g', 1, "New Patients Created with ID ${$id}");
                Redirect::to('../../patients(PAGE).php');
            } else {
                // System::logActivity('u', 2, 'New Patients Creation Failed');
                Redirect::to('../../patients(PAGE).php');
            }
        } catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
