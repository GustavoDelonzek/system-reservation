<?php

namespace App\Repositories;

use App\Models\Reservation;
use Illuminate\Support\Facades\Date;

class ReservationRepository{
    public function getAllReservationsUser(int $user){
        return Reservation::where('user_id', $user)->get();
    }

    public function getReservationById(int $id){
        return Reservation::findOrFail($id);
    }

    public function createReservation(array $reservation){
        return Reservation::create($reservation);
    }


    public function isAvailableRoom(int $room, string $checkIn, string $checkOut){
        $rooms = Reservation::where('room_id', $room)->get();

        foreach($rooms as $room){

            if($checkIn <= $room->check_out_date && $checkIn >= $room->check_in_date){
                return false;
            }
            if($checkOut <= $room->check_out_date && $checkOut >= $room->check_in_date){
                return false;
            }
            if($checkIn <= $room->check_in_date && $checkOut >= $room->check_out_date){
                return false;
            }
            if ($checkIn >= $room->check_in_date && $checkOut <= $room->check_out_date) {
                return false;
            }
        }

        return true;
    }

}
