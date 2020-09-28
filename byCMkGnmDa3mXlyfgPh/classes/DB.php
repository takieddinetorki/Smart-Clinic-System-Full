<?php

class DB
{
    private static $_instance = null;
    private $_pdo,
            $_pdo2,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;
    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host='. Config::get('mysql/host') . ';dbname='. Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            $this->_pdo2 = new PDO('mysql:host='. Config::get('mysql/host'), Config::get('mysql/username'), Config::get('mysql/password'));
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->_pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_pdo2->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // self::$_instance = $this;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB;
        }
        return self::$_instance;
    }
    
    public function setConnection($db) {
        $this->_pdo2 = new PDO('mysql:host='. Config::get('mysql/host') . ';dbname='. $db, Config::get('mysql/username'), Config::get('mysql/password')); 
    }
    public function query($db, $sql, $params = array()) {
        $this->_error = false;
        if ($this->_query = $this->$db->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count =  $this->_query->rowCount();
            }else{
                $this->_error = true;
                // for development environment only
                print_r($this->_query->errorInfo());
            }
        }
        return $this;
    }

    private function action($db, $action, $table, $where = array())
    {
        if (count($where) == 3) {
            $operators = array('=' , '>', '<', '>=', '<=', '!=');
            $field    = $where[0];
            $operator = $where[1];
            $value    = $where[2];
            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if (!$this->query($db, $sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }

    public function get($db, $table, $where)
    {
        return $this->action($db, 'SELECT *', $table, $where);
    }
    public function delete($db, $table, $where)
    {
        return $this->action($db, 'DELETE', $table, $where);
    }

    // Insert a staff user
    public function insert($db, $table , $fields = array())
    {
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;

            foreach ($fields as $field) {
                $values .= '?';
                if ($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }
            $sql = "INSERT INTO {$table} (`" . implode('`, `' , $keys) . "`) VALUES ({$values})";
            if(!$this->query($db, $sql, $fields)->error()) {
                return true;
            }
            return false;
        }
    }

    public function createDB($db, $dbname)
    {
        $sql = "CREATE DATABASE {$dbname}";
        if(!$this->query($db, $sql)->error()) {
            $this->setConnection($dbname);
        }else {
            echo 'There has been a problem';
        }

    }

    public function createTable($db, $table_Name, $fields)
    {
        // first we are checking whether the table is already there or not
        $sql = "SELECT 1 FROM {$table_Name} LIMIT 1";
        $count = 0;
        if ($this->query($db, $sql)->error()) {
            //error occur means table doesn't exist
            $sql = "CREATE TABLE {$table_Name} (";
            foreach($fields as $values){
                foreach($values as $value)
                    $sql .= "{$value} ";
                if($count < (count($fields)-1)) $sql.= ", ";
                else $sql.= ");";
                $count++;
            }
            if (!$this->query($db,$sql)->error()) return true;
        } else echo "Table already exist";
    }

    //newly create function for updating table records
    public function update($table_Name, $conditional_Key, $conditional_Value, $fields, $db='_pdo2'){
        //to avoid putting , at the last set values
        $count = 0;
        $sql = "update {$table_Name} set ";
        foreach($fields as $i => $value){
        $sql .= "{$i} = '{$value}'";
        if($count < (count($fields)-1)) $sql.= ", ";
        $count ++;
    }
        $sql .= "WHERE {$conditional_Key} = '{$conditional_Value}';";
        //please check here before run
        if(!$this->query($db,$sql)) 
            echo "A problem occur while updating the {$table_Name}";
        else return true;
    }

    public function results()
    {
        return $this->_results;
    }
    public function first()
    {
        return $this->results()[0];
    }
    public function error()
    {
        return $this->_error;
    }
    
    public function count()
    {
        return $this->_count;
    }

    // yeasin 
    public function multiDataInsert($tableName, $data, $db){
    
        //Will contain SQL snippets.
        $rowsSQL = array();
     
        //Will contain the values that we need to bind.
        $toBind = array();
        
        //Get a list of column names to use in the SQL statement.
        $columnNames = array_keys($data[0]);

        //Loop through our $data array.
        foreach($data as $arrayIndex => $row){
            $params = array();
            foreach($row as $columnName => $columnValue){
                $param = ":" . $columnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $columnValue; 
            }
            $rowsSQL[] = "(" . implode(", ", $params) . ")";
        }
     
        //Construct our SQL statement
        $sql = "INSERT INTO `$tableName` (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
        //Preparing PDO statement.
        if ($this->_query = $this->$db->prepare($sql)){
            
            //Bind values.
            foreach($toBind as $param => $val){
                $this->_query->bindValue($param, $val);
            }
            
            //Execute statement (i.e. insert the data).
            if($this->_query->execute()) return true;
            else return false;
        }
    }
}
?>