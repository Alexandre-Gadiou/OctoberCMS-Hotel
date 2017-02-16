<?php

namespace Algad\Hotel;

use System\Classes\PluginBase;
use Rainlab\User\Controllers\Users as UsersController;
use Rainlab\User\Models\User as UserModel;
use Backend;

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

    public function registerPermissions()
    {
        return [
            'algad.hotel.manage_hotel' => [
                'tab' => 'algad.hotel::lang.hotel.tab',
                'label' => 'algad.hotel::lang.hotel.manage_hotel'
            ],
            'algad.hotel.access_rooms' => [
                'tab' => 'algad.hotel::lang.hotel.tab',
                'label' => 'algad.hotel::lang.hotel.access_rooms'
            ],
            'algad.hotel.access_customers' => [
                'tab' => 'algad.hotel::lang.hotel.tab',
                'label' => 'algad.hotel::lang.hotel.access_customers'
            ],
            'algad.hotel.access_bookings' => [
                'tab' => 'algad.hotel::lang.hotel.tab',
                'label' => 'algad.hotel::lang.hotel.access_bookings'
            ]
        ];
    }

    public function registerNavigation()
    {
        return [
            'hotel' => [
                'label' => 'algad.hotel::lang.backendMenu.hotel',
                'url' => Backend::url('algad/hotel/reservations'),
                'icon' => 'icon-home',
                'permissions' => ['algad.photography.manage_hotel'],
                'order' => 100,
                'sideMenu' => [
                    'rooms' => [
                        'label' => 'algad.hotel::lang.backendMenu.rooms',
                        'icon' => 'icon-hotel',
                        'url' => Backend::url('algad/hotel/rooms'),
                        'permissions' => ['algad.hotel.access_rooms']
                    ],
                    'customers' => [
                        'label' => 'algad.hotel::lang.backendMenu.customers',
                        'icon' => 'icon-users',
                        'url' => Backend::url('algad/hotel/customers'),
                        'permissions' => ['algad.hotel.access_customers']
                    ],
                    'bookings' => [
                        'label' => 'algad.hotel::lang.backendMenu.bookings',
                        'icon' => 'icon-book',
                        'url' => Backend::url('algad/hotel/bookings'),
                        'permissions' => ['algad.hotel.access_bookings']
                    ]
                ]
            ]
        ];
    }

    public function registerSettings()
    {
        
    }

    public function boot()
    {

        UserModel::extend(function($model)
        {
            $model->addFillable([
                'dateOfBirth'
            ]);
        });

        UsersController::extendFormFields(function($form, $model, $context)
        {
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
