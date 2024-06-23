<?php

namespace App\Helpers;

use Validator;

class CustomRegex {
    public static function validateUserName() {
        Validator::extend('user_name', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $value);
        });
    }
    public static function validateNumberAndDashes() {
        Validator::extend('number_dashes', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9_-]+$/', $value);
        });
    }
    public static function validatePhoneNumber() {
        Validator::extend('phone_number', function($attribute, $value, $parameters, $validator) {
            return preg_match("/^([0-9\s\-]*)$/", $value);
        });
    }
    public static function validateFaxNumber() {
        Validator::extend('fax_number', function($attribute, $value, $parameters, $validator) {
            return preg_match("/^([0-9\s\-]*)$/", $value);
        });
    }
    public static function validateZipCode() {
        Validator::extend('zip_code', function($attribute, $value, $parameters, $validator) {
            return preg_match("/^[0-9]+$/", $value);
        });
    }
}