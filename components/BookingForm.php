<?php

namespace Algad\Hotel\Components;

use Algad\Hotel\Components\AbstractForm;
use Exception;
use Input;
use Algad\Hotel\Models\Booking;
use Algad\Hotel\Models\Room;
use Algad\Hotel\Models\Customer;
use Event;
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
        return $_GET[$string];
    }

    public function onBook()
    {
        $user = Auth::getUser();
        if ($user == null)
        {
            throw new ApplicationException("Try to book a room whithout beeing connected");
        }

        $data = post();

        $checkin = $data['checkin'];
        $checkout = $data['checkout'];
        $room_id = $data['room_id'];
        $user_id = $user->id;


        Event::fire('algad.hotel.beforeBooking', [&$data]);

        $room = Room::where('id', $room_id)->first();

        if (!($room != null && $room['is_available']))
        {
            Flash::error("Registration failed : room is not yet available");
        }
        else
        {
            $booking = new Booking();
            $booking->checkin = $checkin;
            $booking->checkout = $checkout;
            $booking->room_id = $room_id;
            $booking->user_id = $user_id;
            $now = $booking->freshTimestamp();
            $booking->created_at = $now;
            $booking->updated_at = $now;
            $booking->save();
            $booking->rooms()->add($room);

            Event::fire('algad.hotel.booking', [$booking, $data]);

            Flash::success("Registration successfull");
        }
    }

}
