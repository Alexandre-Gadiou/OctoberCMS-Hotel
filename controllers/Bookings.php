<?php

namespace Algad\Hotel\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Algad\Hotel\Models\Booking;

/**
 * Bookings Back-end Controller
 */
class Bookings extends Controller
{

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $requiredPermissions = [
        'algad.hotel.manage_bookings'
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Algad.Hotel', 'hotel', 'bookings');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds))
        {

            foreach ($checkedIds as $id)
            {
                if ((!$booking = Booking::find($id)))
                    continue;
                $booking->delete();
            }
        }

        return $this->listRefresh();
    }

}
