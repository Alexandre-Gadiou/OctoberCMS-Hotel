<?php

return [
    'plugin' => [
        'name' => 'Hotel',
        'description' => 'room, customer, bill management system'
    ],
    'signInForm' => [
        'name' => 'Sign In form',
        'description' => 'Login'
    ],
    'registrationForm' => [
        'name' => 'Registration form',
        'description' => 'Inscription'
    ],
    'updateAccountForm' => [
        'name' => 'Update account form',
        'description' => 'Update profile'
    ],
    'room' => [
        'title' => 'Title',
        'number' => 'Number',
        'is_available' => 'Available',
        'list_delete_confirm' => 'Do you really want to delete this room ?'
    ],
    'booking' => [
        'date_in' => 'Arrival',
        'date_out' => 'Departure',
        'user' => 'User',
        'rooms' => 'Rooms',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'list_delete_confirm' => 'Do you really want to delete this booking ?'
    ],
    'customer' => [
        'firstname' => 'First Name',
        'lastname' => 'Last Name',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Confirm password',
        'list_delete_confirm' => 'Do you really want to delete this customer ?'
    ],
    'backendMenu' => [
        'hotel' => 'Hotel',
        'rooms' => 'Rooms',
        'customers' => 'Customers',
        'bookings' => 'Bookings',
        'bills' => 'Bills'
    ],
    'permissions' => [
        'tab' => 'Hotel',
        'manage_hotel' => 'Manage hotel',
        'manage_rooms' => 'Manage rooms',
        'manage_customers' => 'Manage customers',
        'manage_bookings' => 'Manage bookings',
        'manage_bills' => 'Manage bills',
    ],
    'button' => [
        'cancel' => 'Cancel',
        'create' => 'Create',
        'save' => 'Save',
        'newRoom' => 'New room',
        'newBooking' => 'New booking',
        'newCustomer' => 'New customer'
    ]
];
