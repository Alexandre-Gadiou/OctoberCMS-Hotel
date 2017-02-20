<?php

namespace Algad\Hotel\Components;

use Algad\Hotel\Components\AbstractForm;

class BookingForm extends AbstractForm
{

    public function componentDetails()
    {
        return [
            'name' => 'algad.hotel::lang.bookingForm.name',
            'description' => 'algad.hotel::lang.bookingForm.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'resultPage' => [
                'title' => 'algad.hotel::lang.abstractForm.resultPage',
                'description' => 'algad.hotel::lang.abstractForm.resultPage_description',
                'type' => 'dropdown',
                'default' => ''
            ],
        ];
    }

}
