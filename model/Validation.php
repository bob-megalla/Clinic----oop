<?php 
require_once BASE_PATH . "Session.php";
class Validation extends Session{

    
    private array $errors = [];
    private $validators = [
        "required" => "required",
        "string"   => "string",
        "min"      => "min",
        "max"      => "max",
        "email"    => "email",
        "url"      => "url",
        "alpha"    => "alpha",
    ];

    private array $data = [];


    public function __construct(){
        $this->data = $this->getPostData();
    }

    private function getPostData(){
        $data = [];
        foreach($_POST as $key => $value){
            $data[$this->input($key)] = $this->input($value);
        }
        return $data;
    }

    public function getData(){
        return $this->data ?? "";
    }
   

    /**
     * @param array $rules for validations  
     * activate errors of not 
     */
    public function validate(array $input_rules){
        foreach($input_rules as $field => $rules){
            foreach($rules as $rule){
                $input_value = $this->data[$field];
                if(isset($this->errors[$field])){
                    break;
                }
                $this->validateField($field, $rule , $input_value);
            }
        }

    }

    /**
     * @param string $value of the post input 
     * sanitize all values
     */
    private function input($value){
        return trim(htmlspecialchars($value));
    }

    /**
     * @param string $filed name of the post input
     * @param string $rule for validation
     * @param string $input_value of the post input
     * actiual validation function for all inputs according to thier rules
     */
    private function validateField($field, $rule,$input_value){
        // echo $rule . "<br> " . $input_value . "<br>" . $field . "<hr>";
        if(str_contains($rule,":")){
            $full_rule = explode(":",$rule);
            $rule = $this->validators[$full_rule[0]];
            $this->$rule($field,$input_value,$full_rule[1]);
        }else{
            $this->$rule($field,$input_value);
        }   
    }

    private function required($field, $value){
        $field = strtoupper($field);
        if(empty($value)){
            $this->addError($field, "The $field field is required.");
        }
    }

    private function string($field, $value){
        $field = strtoupper($field);
        if(!preg_match("/^[a-zA-Z0-9 .]+$/",$value)){
            $this->addError($field, "The $field field must contain only letters, numbers, and spaces.");
        }
    }

    private function alpha($field, $value){
        $field = strtoupper($field);
        if(!preg_match("/^[a-zA-Z ]+$/",$value)){
            $this->addError($field, "The $field field must contain only letters and spaces");
        }
    }

    private function numeric($field, $value){
        $field = strtoupper($field);
        if(!is_numeric($value)){
            $this->addError($field, "The $field field must be a numeric value.");
        }
    }

    private function email($field, $value){
        $field = strtoupper($field);
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            $this->addError($field, "The $field field must be a valid email address.");
        }
    }

    private function min($field, $value, $min){
        $field = strtoupper($field);
        if(strlen($value) < $min){
            $this->addError($field, "The $field field must have at least $min characters.");
        }
    }

    private function max($field, $value, $max){
        $field = strtoupper($field);
        if(strlen($value) > $max){
            $this->addError($field, "The $field field must be less than $max characters.");
        }
    }

    private function addError($field, $message){
        $this->errors[$field] = $message;
    }

    public function addPrivateError($field, $message){
        $this->errors[$field] = $message;
    }

    public function getErrors(){
        return $this->errors;
    }


}