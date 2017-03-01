<?php

return [
    'plugin' => [
        'name' => 'Hotel',
        'description' => 'room, customer, bill management system'
    ],
    'abstractForm' => [
        'redirect' => 'Redirect URL',
        'redirect_description' => 'URL location after submit form'
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
    'searchForm' => [
        'name' => 'Search form',
        'description' => 'Booking search form',
        'redirect' => 'Search results Page'
    ],
    'searchResult' => [
        'name' => 'Search results',
        'description' => 'Display available rooms in function of search parameters',
        'redirect' => 'Booking page'
    ],
    'bookingForm' => [
        'name' => 'Booking form',
        'description' => 'Display a form to book a room',
    ],
    'customer' => [
        'firstname' => 'First Name',
        'lastname' => 'Last Name',
        'email' => 'Email',
        'dateOfBirth' => 'Date of birth',
        'password' => 'Password',
        'password_confirmation' => 'Confirm password',
        'list_delete_confirm' => 'Do you really want to delete this customer ?'
    ],
    'room' => [
        'title' => 'Title',
        'number' => 'Number',
        'capacity' => 'Capacity',
        'nightly_price' => 'Price (per night)',
        'description' => 'Description',
        'featured_images' => 'Photos',
        'is_available' => 'Available',
        'list_delete_confirm' => 'Do you really want to delete this room ?'
    ],
    'booking' => [
        'checkin' => 'Arrival',
        'checkout' => 'Departure',
        'user' => 'User',
        'rooms' => 'Rooms',
        'adults' => 'Adults',
        'children' => 'Children',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'list_delete_confirm' => 'Do you really want to delete this booking ?'
    ],
    'bill' => [
        'id' => 'ID',
        'amount' => 'Amount',
        'currency' => 'Currency',
        'is_paid' => 'Paid',
        'created_at' => 'Created at',
        'list_delete_confirm' => 'Do you really want to delete this bill ?'
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
        'newCustomer' => 'New customer',
        'generateBill' => 'Generate Bill'
    ]
];
