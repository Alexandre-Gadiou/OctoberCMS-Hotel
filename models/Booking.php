<?php

namespace Algad\Hotel\Models;

use Model;

/**
 * Model
 */
class Booking extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */

    public $timestamps = false;

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'algad_hotel_bookings';

    /*
     * Relations
     */
    public $belongsToMany = [
        'rooms' => [
            'Algad\Hotel\Models\Room',
            'table' => 'algad_hotel_bookings_rooms',
            'order' => 'number'
        ]
    ];
    public $belongsTo = [
        'user' => [
            'Algad\Hotel\Models\Customer',
            'table' => 'user',
            'order' => 'email'
        ]
    ];

}
