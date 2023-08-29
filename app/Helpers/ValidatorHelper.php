<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\Setting;
use Exception;
use File;
use Image;

class ValidatorHelper
{
    public static function validatorMessage($validator)
    {


        $errors = [];

        foreach ($validator->errors()->toArray() as $field => $errorMessages) {
            $errors[$field] = $errorMessages[0];
        }

        return $errors;
    }
}
