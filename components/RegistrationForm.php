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
            'redirect_to' => [
                'title' => 'algad.hotel::lang.abstractAccountForm.redirect_to',
                'description' => 'algad.hotel::lang.abstractAccountForm.redirect_to_description',
                'default' => '',
                'type' => 'string'
            ]
        ];
    }

}
