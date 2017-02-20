<?php

namespace Algad\Hotel\Components;

use RainLab\User\Components\Account as RAccount;

class UpdateAccountForm extends RAccount
{

    public function componentDetails()
    {
        return [
            'name' => 'algad.hotel::lang.updateAccountForm.name',
            'description' => 'algad.hotel::lang.updateAccountForm.description'
        ];
    }

    public function defineProperties()
    {
        return [
        ];
    }

}
