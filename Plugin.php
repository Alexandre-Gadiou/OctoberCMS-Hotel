<?php namespace Algad\Hotel;

use System\Classes\PluginBase;

use Rainlab\User\Controllers\Users as UsersController;
use Rainlab\User\Models\User as UserModel;


class Plugin extends PluginBase
{

    public function registerComponents()
    {
        return [
            'Algad\Hotel\Components\SignInForm' => 'signInForm',
            'Algad\Hotel\Components\RegistrationForm' => 'registrationForm',
            'Algad\Hotel\Components\UpdateAccountForm' => 'updateAccountForm'
        ];
    }

    public function registerSettings()
    {
    }

    public function boot() {

        UserModel::extend(function($model){
            $model->addFillable([
                'dateOfBirth'
            ]);
        });

    	UsersController::extendFormFields(function($form,$model,$context){
    		$form->addTabFields([
				'dateOfBirth' => [
					'label' => 'Date of birth',
					'type' => 'datepicker',
					'mode' => 'date',
					'span' => 'auto',
					'tab' => 'rainlab.user::lang.user.account'
				]
			]);
    	});
    }
}
