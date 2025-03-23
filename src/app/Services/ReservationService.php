<?php

namespace App\Services;

use App\Repositories\HotelRepository;
use App\Repositories\ReservationRepository;
use App\Repositories\RoomRepository;
use Illuminate\Support\Facades\Date;

class ReservationService{
    public function __construct(protected ReservationRepository $reservationRepository, protected HotelRepository $hotelRepository, protected RoomRepository $roomRepository)
    {

    }

    public function allReservations(){
        return $this->reservationRepository->getAllReservations();
    }

    public function store(array $reservation, int $hotel){
        if(!$this->hotelRepository->getHotelById($hotel)){
           throw new \Exception('Hotel not found');
        }

        if(!$this->reservationRepository->isAvailableRoom($reservation['room_id'], $reservation['check_in_date'], $reservation['check_out_date'])){
            throw new \Exception('Room not available');
        }

        $days = (Date::parse($reservation['check_out_date'])->diffInDays(Date::parse($reservation['check_in_date'])));

        $reservation['total_price'] = $this->roomRepository->priceTotal($reservation['room_id'], $days);

        return $this->reservationRepository->createReservation($reservation);

    }
}
