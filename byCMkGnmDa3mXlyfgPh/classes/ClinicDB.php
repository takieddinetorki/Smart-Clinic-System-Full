<?php 
class ClinicDB
{
    private $_db,
            $_clinic,
            $_sessionName,
            $_sessionValue;
    

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        if (Session::exists($this->_sessionName)) {
            $this->_sessionValue = Session::get($this->_sessionName);
        }
        
    }



    public function getClinic() {
        if (Session::exists($this->_sessionName)) {
            $data = $this->_db->get('_pdo', 'staff', array('staffID', '=', $this->_sessionValue));
            $this->_clinic = $data->first()->clinic;
            return $this->_clinic;
        }else {
            return false;
        }
    }


    public function getClinicInfo($desiredFiled,$conditionField,$value){
        if ($data = $this->_db->get('_pdo', 'clinics', array($conditionField, '=', $value))) {
            switch($desiredFiled){
                case 'clinicName': return $data->first()->clinicName; break;
                case 'clinicID': return $data->first()->clinicID;break;
                case 'abbr': return $data->first()->abbr;break;
                case 'salesTaxR'      : return $data->first()->salesTaxR;break;
                case 'GSTRegister': return $data->first()->GSTRegister;break;
                case 'BankAccount'      : return $data->first()->BankAccount;break;
                case 'Address'      : return $data->first()->Address;break;
            }
        }else{
            echo 'Something went wrong please try again later.';
        }
    }
    

    public function getAllAbbreviations(){
        $sql = 'SELECT abbr FROM `clinics`';
        if($values = $this->_db->query('_pdo',$sql)->results()) {
            foreach($values as $value) {
                foreach ($value as $data) {
                    $actualData = deescape($data);
                    echo "<option value={$actualData}>{$actualData}</option>";
                }
            }
        }else{
            echo "<option>Hmmm... Seems like it's empty <br> or something went wrong</option>";
        } 
    }

    public function getAllClinics(){
        $sql = 'SELECT clinicName FROM `clinics`';
        if($values = $this->_db->query('_pdo',$sql)->results()) {
            foreach($values as $value) {
                foreach ($value as $data) {
                    $actualData = deescape($data);
                    echo "<option value={$actualData}>{$actualData}</option>";
                }
            }
        }else{
            return false;
        } 
    }
}

?>