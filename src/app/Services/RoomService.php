<?php

namespace App\Services;

use App\Repositories\HotelRepository;
use App\Repositories\RoomRepository;

class RoomService{

    public function __construct(protected RoomRepository $roomRepository, protected HotelRepository $hotelRepository)
    {

    }

    public function allRooms(){
        return $this->roomRepository->getAllRooms();
    }

    public function store(array $room, int $hotel){

        $this->hotelRepository->getHotelById($hotel);

        $room['hotel_id'] = $hotel;

        return $this->roomRepository->createRoom($room);
    }

    public function availableRooms(int $hotel){

        return $this->roomRepository->getAvailableRooms($hotel);
    }

    public function show(int $room){
        return $this->roomRepository->getRoomById($room);
    }

}
