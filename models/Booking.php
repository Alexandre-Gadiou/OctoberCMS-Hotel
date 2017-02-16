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

}
