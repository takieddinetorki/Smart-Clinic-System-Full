<?php
class User
{
    private $_db,
            $_data,
            $_sessionName,
            $_isLoggedIn = false;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');

        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $staffID = Session::get($this->_sessionName);
                if ($this->find($staffID, null)) {
                    $this->_isLoggedIn = true;
                }
            }
        }else {
            $this->find($user);
        }
    }


    public function create($table, $fields = array()) {
        if (!$this->_db->insert('_pdo',$table, $fields)) {
            throw new Exception("Sorry! There was a problem creating your account please try again later or contact us!");
        }
    }

    //this function created by Yash for Updating the profile through the My Profile page
    public function updateProfile($table, $fields = array(),$condtionKey,$condtionValue) {
        if (!$this->_db->update($table,$condtionKey,$condtionValue, $fields)) {
            throw new Exception("Sorry! There was a problem updating your account please try again later or contact us!");
        }
    }

    public function find($staffID = null, $user = null) {
        if ($user) {
            $data = $this->_db->get('_pdo', 'staff', array('username', '=', $user));
            if ($data->count()) {
                $this->_data= $data->first();
                return true;
            }
        }
        if ($staffID) {
            $data = $this->_db->get('_pdo', 'staff', array('staffID', '=', $staffID));
            if ($data->count()) {
                $this->_data= $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null) {
        $user = $this->find(null, $username);
        if ($user) {
            if ($this->data()->password === Hash::generate($password, $this->data()->encryptionKey, 128)) {
                print_r($this->data()->staffID);
                Session::put($this->_sessionName, $this->data()->staffID);
                return true;
            }
        }
        return false;
    }

    public function data() {
        return $this->_data;
    }
    public function loggedIn() {
        return $this->_isLoggedIn;
    }

    public function logout()
    {
        if (Session::exists($this->_sessionName)) {
            Session::delete($this->_sessionName);
            Redirect::to('../index.php');
        }
    }
}
?>