<?php
class ID
{
    private $ID,
        $random,
        $time,
        $clinic,
        $currentDay,
        $currentMonth,
        $currentYear;

    function __construct($abbr = NULL)
    {
        if ($abbr) {
            $this->clinic = $abbr;
        } else {
            //  $this->setCompany();
            // getting the clinic name from the staff's clinic name 
            $user = new User;
            $clinic = new ClinicDB;
            $this->clinic = deescape($clinic->getClinicInfo('abbr', 'clinicID', $user->data()->clinicID));
        }
        $this->setTime();
        $this->setRand();
        $this->currentYear = date('y');
        $this->currentMonth = date('m');
        $this->currentDay = date('d');
    }

    /**
     * Don't know what the bloody hell this is. User isn't logged in so 
     * it's not gonna return anything so it's gonna prompt an error lads what the hell
     * 
     */
    /*private function setCompany() 
    {
        $user = new User();
        $value = $user->data()->clinicID;
        $clinicabbr = new ClinicDB();
        $this->clinic = deescape($clinicabbr->getClinicInfo('abbr','clinicID',$value));
    }*/

    private function setTime()
    {
        $this->time = substr(time(), -2);
    }

    private function setRand()
    {
        $this->random = rand(100, 999);
        return $this->random;
    }

    public function generate()
    {
        return "{$this->clinic}{$this->random}{$this->time}";
    }

    public function generateClinicID()
    {
    }

    public function generateID($type)
    {
        switch ($type) {
            case 'staff':
                return "{$this->clinic}{$this->currentYear}ST{$this->random}{$this->time}";
                break;
            case 'doctor':
                return "{$this->clinic}DR{$this->random}{$this->time}";
                break;
            case 'pharmacist':
                return "{$this->clinic}{$this->currentYear}PC{$this->random}{$this->time}";
                break;
            case 'patient':
                return "PID{$this->currentYear}{$this->random}{$this->time}";
                break;
            case 'appointment':
                return "A{$this->currentDay}{$this->currentMonth}{$this->random}{$this->time}";
                break;
            case 'medicine':
                return "MD{$this->random}{$this->time}";
                break;
            case 'accountCode':
                return "AC{$this->time}";
                break;
            case 'voucherNo':
                return "VN{$this->random}{$this->time}{$this->currentYear}";
                break;
            case 'vendor':
                return "VD{$this->random}{$this->time}";
                break;
            case 'inventory':
                return "{$this->clinic}IR{$this->time}";
                break;
            case 'purchase':
                return "PR{$this->random}{$this->time}";
                break;
            case 'order':
                return "OI{$this->random}{$this->time}";
                break;
            case 'clinic':
                return "{$this->clinic}{$this->time}{$this->random}";
                break;
            case 'diagnosis':
                return "R{$this->time}{$this->random}";
                break;
            case 'billing':
                return "B{$this->currentYear}{$this->time}{$this->random}";
                break;
        }
    }
}
