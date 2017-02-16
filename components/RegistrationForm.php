<?php namespace Algad\Hotel\Components;

use RainLab\User\Components\Account as RAccount;
use Exception;

class RegistrationForm extends RAccount
{
    public function componentDetails()
    {
        return [
            'name'        => 'algad.hotel::lang.registrationForm.name',
            'description' => 'algad.hotel::lang.registrationForm.description'
        ];
    }

}
