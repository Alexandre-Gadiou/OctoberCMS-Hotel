<?php

namespace Algad\Hotel\Components;

use Algad\Hotel\Components\AbstractAccountForm;

class SignInForm extends AbstractAccountForm
{

    public function componentDetails()
    {
        return [
            'name' => 'algad.hotel::lang.signInForm.name',
            'description' => 'algad.hotel::lang.signInForm.description'
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
