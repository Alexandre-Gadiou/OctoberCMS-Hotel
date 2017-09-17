<?php

namespace Algad\Hotel\Models;

use Model;
use Markdown;

/**
 * Model
 */
class Room extends Model
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
        'title' => 'required|string',
        'number' => 'required|numeric',
        'capacity' => 'required|integer',
        'nightly_price' => 'required|numeric',
    ];
    public $translatable = [
        'title',
        'description'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'algad_hotel_rooms';
    public $hasMany = [
        'booking' => 'Algad\Hotel\Models\Booking'
    ];
    public $attachMany = [
        'featured_images' => ['System\Models\File', 'order' => 'sort_order'],
        'content_images' => ['System\Models\File']
    ];

    public function beforeSave()
    {
        $this->description_html = self::formatHtml($this->description);
    }

    public static function formatHtml($input, $preview = false)
    {
        $result = Markdown::parse(trim($input));
        return $result;
    }

}
