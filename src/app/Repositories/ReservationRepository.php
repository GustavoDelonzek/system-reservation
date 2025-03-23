<?php

namespace App\Repositories;

use App\Models\Reservation;

class ReservationRepository{
    public function getAllReservations(){
        return Reservation::all();
    }

    public function getReservationById(int $id){
        return Reservation::findOrFail($id);
    }

    public function createReservation(array $reservation){
        return Reservation::create($reservation);
    }

    public function updateReservation(array $reservation, int $id){
        $reservation = Reservation::findOrFail($id);
        return $reservation->update($reservation);
    }

    

}
