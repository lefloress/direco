<?php namespace Direco\Support;

use Direco\Helpers\Rif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator as LaravelValidator;

class Validator extends LaravelValidator {

    protected function validateCurrentPassword($attribute, $value, $parameters)
    {
        return Hash::check($value, Auth::user()->clave);
    }

    protected function validateRif($attribute, $value, $parameters)
    {
        return Rif::isValid($value) && $this->validateUnique($attribute, $value, ['usuarios', 'cedula_rif']);
    }

} 