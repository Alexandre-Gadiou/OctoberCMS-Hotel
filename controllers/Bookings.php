<?php

namespace Algad\Hotel\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Algad\Hotel\Models\Booking;
use Algad\Hotel\Models\Customer;
use DateTime;
use DateTimeZone;
use Backend\Models\UserPreference;

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
    public $timestamps = true;

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Algad.Hotel', 'hotel', 'bookings');
    }

    public function listOverrideColumnValue($record, $columnName, $definition)
    {
        $preferences = UserPreference::forUser()->get('backend::backend.preferences');
        $timezone = $preferences['timezone'];
        $datetimeFormat = "Y-m-d H:i:s";
        $dateFormat = "Y-m-d";

        $result = "";
        switch ($columnName)
        {
            case 'checkin' :
                $result = $this->getFormatedDate($record->checkin, $timezone, $dateFormat);
                break;
            case 'checkout' :
                $result = $this->getFormatedDate($record->checkout, $timezone, $dateFormat);
                break;
            case 'created_at' :
                $result = $this->getFormatedDate($record->created_at, $timezone, $datetimeFormat);
                break;
            case 'updated_at' :
                $result = $this->getFormatedDate($record->updated_at, $timezone, $datetimeFormat);
                break;
            default:
                break;
        }

        return $result;
    }

    private function getFormatedDate($input, $timezone, $format)
    {
        $result = (new \DateTime($input))->setTimezone(new \DateTimeZone($timezone));
        return $result->format($format);
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
