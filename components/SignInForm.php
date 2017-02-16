<?php namespace Algad\Hotel\Components;

use RainLab\User\Components\Account as RAccount;
use Exception;

class SignInForm extends RAccount
{
    public function componentDetails()
    {
        return [
            'name'        => 'algad.hotel::lang.signInForm.name',
            'description' => 'algad.hotel::lang.signInForm.description'
        ];
    }

}
