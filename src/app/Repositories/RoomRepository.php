<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository{


    public function getAllRooms(){
        return Room::all();
    }

    public function getRoomById(int $id){
        return Room::findOrFail($id);
    }

    public function getRoomByHotel(int $hotel){
        return Room::where('hotel_id', $hotel)->get();
    }

    public function createRoom(array $room){

        return Room::create($room);
    }

    public function priceTotal(int $room, int $days){
        return Room::findOrFail($room)->price_per_night * $days;
    }


}
