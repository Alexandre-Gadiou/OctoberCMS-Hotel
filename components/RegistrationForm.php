<?php

namespace Algad\Hotel\Components;

use Algad\Hotel\Components\AbstractAccountForm;

class RegistrationForm extends AbstractAccountForm
{

    public function componentDetails()
    {
        return [
            'name' => 'algad.hotel::lang.registrationForm.name',
            'description' => 'algad.hotel::lang.registrationForm.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'redirect' => [
                'title' => 'algad.hotel::lang.abstractForm.redirect',
                'description' => 'algad.hotel::lang.abstractForm.redirect_description',
                'type' => 'dropdown',
                'default' => ''
            ]
        ];
    }

}
