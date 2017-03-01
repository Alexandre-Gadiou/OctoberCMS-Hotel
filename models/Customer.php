<?php

namespace Algad\Hotel\Models;

use RainLab\User\Models\User;

/**
 * Model
 */
class Customer extends User
{

    public $rules = [
        'name' => 'required|alpha',
        'surname' => 'required|alpha',
        'dateOfBirth' => 'required|date',
        'email' => 'required|between:6,255|email|unique:users',
        'password' => 'required:create|between:4,255|confirmed',
        'password_confirmation' => 'required_with:password|between:4,255'
    ];

}
