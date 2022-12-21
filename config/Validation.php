<?php

namespace config;

use Exception;

class Validation {
    static function val_int($value) {
        return filter_var($value, FILTER_VALIDATE_INT);
    }

    static  function val_str($value) {
        return filter_var($value, FILTER_VALIDATE_REGEXP);
    }

    static function  val_url($value) {
        return filter_var($value, FILTER_VALIDATE_URL);
    }
}
