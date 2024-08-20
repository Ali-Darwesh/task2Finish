<?php

class Validation {
    private $errors = [];

    // Method to check if a field is empty
    public function checkRequired($field, $value) {
        if (empty(trim($value))) {
            $this->errors[$field] = "$field cannot be empty.";
        }
    }

    // Method to validate an array of required fields
    public function validateRequiredFields($data, $requiredFields) {
        foreach ($requiredFields as $field) {
            if (isset($data[$field])) {
                $this->checkRequired($field, $data[$field]);
            } else {
                $this->errors[$field] = "$field is missing.";
            }
        }
    }

    // Method to check if validation passed
    public function isValid() {
        return empty($this->errors);
    }

    // Method to get errors
    public function getErrors() {
        return $this->errors;
    }
}
?>
