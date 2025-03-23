<?php

namespace App\Services;

use App\Repositories\ReservationRepository;

class ReservationService{
    public function __construct(protected ReservationRepository $reservationRepository)
    {

    }

    public function allReservations(){
        return $this->reservationRepository->getAllReservations();
    }
}
