<?php

namespace Config;


class Validation {
    static function val_int($value) {
        return filter_var($value, FILTER_VALIDATE_INT);
    }
}
