<?php

namespace Algad\Hotel\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Algad\Hotel\Models\Room;

/**
 * Rooms Back-end Controller
 */
class Rooms extends Controller
{

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $requiredPermissions = [
        'algad.hotel.manage_rooms'
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Algad.Hotel', 'hotel', 'rooms');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds))
        {

            foreach ($checkedIds as $id)
            {
                if ((!$room = Room::find($id)))
                    continue;
                $room->delete();
            }
        }

        return $this->listRefresh();
    }

}
