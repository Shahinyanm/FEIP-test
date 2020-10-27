<?php

class Validator {

    /**
     * Private data, rules
     */
    private $data, $rules;

    /**
     * Set variables data, rules
     */
    public function __construct($data, $rules) {
        $this->data = $data;
        $this->rules = $rules;
    }

    /**
     * Validation
     */
    public function validate() {
        $errors = [];

        foreach($this->data as $key => $val) {
            $error = false;
            if(is_array($this->rules[$key])) {
                if(preg_match($this->rules[$key]['ref'], $val) === 0) {
                    $error = true;
                }
            }
            elseif(filter_var($val, $this->rules[$key]) === false) {
                $error = true;
            }

            if($error) {
                array_push($errors, [$key => "Invalid property"]);
            }
        }

        return $errors;
    }

}