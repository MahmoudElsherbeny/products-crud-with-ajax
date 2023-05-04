<?php 

namespace App\Core;

use App\Core\DBConnection;

class Validation
{
    protected $errors = [];

    // database connection and table name
    private function DB()
    {
        $db = new DBConnection();
        return $db->getConnection();
    }

    // return validation errors messages
    public function get_errors() 
    {
        return $this->errors;
    }

    // validate input
    public function check_input($input_name, $value, array $rules = null) 
    {
        if(in_array("required", $rules)) {
            $this->empty_input($input_name, $value);
        }

        if(in_array("numeric", $rules)) {
            $this->numeric_input($input_name, $value);
        }

        if(in_array("unique", $rules) || array_key_exists("unique", $rules)) {
            $this->unique_input($rules['unique'][0], $rules['unique'][1], $input_name, $value);
        }

        if(in_array("max", $rules) || array_key_exists("max", $rules)) {
            $this->max_letters_input($rules['max'], $input_name, $value);
        }

        if(in_array("in_array", $rules) || array_key_exists("in_array", $rules)) {
            $this->in_array_input($rules['in_array'], $input_name, $value);
        }
    
        return $this->prepare_input($value);
    }

    // validate if input is empty
    public function empty_input($input_name, $value) 
    {
        if (empty($value) || $value == null) {
            $this->errors[$input_name] = $input_name." is required";
        }
    }

    // validate if input is numeric
    public function numeric_input($input_name, $value) 
    {
        if (!is_numeric($value)) {
            $this->errors[$input_name] = $input_name." must be numeric";
        }
    }

    // validate if input has max letters length
    public function max_letters_input($max_value, $input_name, $value) 
    {
        if (strlen($value) > $max_value) {
            $this->errors[$input_name] = $input_name." max length is ".$max_value;
        }
    }

    // validate if input value is equal one of array values
    public function in_array_input($array_of_values, $input_name, $value) 
    {
        if (!in_array($value, $array_of_values)) {
            $this->errors[$input_name] = $input_name." is invalid";
        }
    }

    // validate if input is unique in database
    public function unique_input($table_name, $column_name, $input_name, $value)
    {
        $query = "SELECT * FROM ".$table_name." WHERE ".$column_name." = '$value'";
        $result = $this->DB()->query( $query )->fetchAll();
        if (count($result) > 0) {
            $this->errors[$input_name] = $input_name." is already exists in ".$table_name;
        }
    }

    // remove an necessary white space or slashes and prtotect from xss.
    public function prepare_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}