<?php

namespace Algad\Hotel\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use RainLab\User\Models\User;
use Exception;

/**
 * Customers Back-end Controller
 */
class Customers extends Controller
{

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $requiredPermissions = [
        'algad.hotel.manage_customers',
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Algad.Hotel', 'hotel', 'customers');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds))
        {
            foreach ($checkedIds as $id)
            {
                if ((!$record = User::find($id)))
                    continue;
                $record->forceDelete();
            }
        }

        return $this->listRefresh();
    }

}
