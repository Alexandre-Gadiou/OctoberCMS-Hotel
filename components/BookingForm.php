<?php

namespace Algad\Hotel\Components;

use Algad\Hotel\Components\AbstractForm;
use Exception;
use Input;
use Algad\Hotel\Models\Booking;
use Algad\Hotel\Models\Room;
use Algad\Hotel\Models\Customer;
use Algad\Hotel\Helpers\BookingHelper;
use Algad\Hotel\Helpers\UrlHelper;
use ApplicationException;
use Auth;
use Flash;

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
            'redirect' => [
                'title' => 'algad.hotel::lang.abstractForm.redirect',
                'description' => 'algad.hotel::lang.abstractForm.redirect_description',
                'type' => 'dropdown',
                'default' => ''
            ],
        ];
    }

    public function getURLParam($string)
    {
        return UrlHelper::getUrlParameter($string);
    }

    public function onBook()
    {
        try
        {
            BookingHelper::createBooking(post());
            Flash::success("Booking successfull");
        } catch (Exception $ex)
        {
            throw new ApplicationException("Sorry an error occured during your booking");
        }
    }

}
