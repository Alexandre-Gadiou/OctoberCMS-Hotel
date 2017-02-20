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
            'Algad\Hotel\Components\UpdateAccountForm' => 'updateAccountForm',
            'Algad\Hotel\Components\SearchForm' => 'searchForm'
        ];
    }

    public function registerPermissions()
    {
        return [
            'algad.hotel.manage_hotel' => [
                'tab' => 'algad.hotel::lang.permissions.tab',
                'label' => 'algad.hotel::lang.permissions.manage_hotel'
            ],
            'algad.hotel.manage_rooms' => [
                'tab' => 'algad.hotel::lang.permissions.tab',
                'label' => 'algad.hotel::lang.permissions.manage_rooms'
            ],
            'algad.hotel.manage_customers' => [
                'tab' => 'algad.hotel::lang.permissions.tab',
                'label' => 'algad.hotel::lang.permissions.manage_customers'
            ],
            'algad.hotel.manage_bookings' => [
                'tab' => 'algad.hotel::lang.permissions.tab',
                'label' => 'algad.hotel::lang.permissions.manage_bookings'
            ],
            'algad.hotel.manage_bills' => [
                'tab' => 'algad.hotel::lang.permissions.tab',
                'label' => 'algad.hotel::lang.permissions.manage_bills'
            ]
        ];
    }

    public function registerNavigation()
    {
        return [
            'hotel' => [
                'label' => 'algad.hotel::lang.backendMenu.hotel',
                'url' => Backend::url('algad/hotel/bookings'),
                'icon' => 'icon-home',
                'permissions' => ['algad.hotel.manage_hotel'],
                'order' => 100,
                'sideMenu' => [
                    'rooms' => [
                        'label' => 'algad.hotel::lang.backendMenu.rooms',
                        'icon' => 'icon-hotel',
                        'url' => Backend::url('algad/hotel/rooms'),
                        'permissions' => ['algad.hotel.manage_rooms']
                    ],
                    'customers' => [
                        'label' => 'algad.hotel::lang.backendMenu.customers',
                        'icon' => 'icon-users',
                        'url' => Backend::url('algad/hotel/customers'),
                        'permissions' => ['algad.hotel.manage_customers']
                    ],
                    'bookings' => [
                        'label' => 'algad.hotel::lang.backendMenu.bookings',
                        'icon' => 'icon-book',
                        'url' => Backend::url('algad/hotel/bookings'),
                        'permissions' => ['algad.hotel.manage_bookings']
                    ],
                    'bills' => [
                        'label' => 'algad.hotel::lang.backendMenu.bills',
                        'icon' => 'icon-bank',
                        'url' => Backend::url('algad/hotel/bills'),
                        'permissions' => ['algad.hotel.manage_bills']
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
