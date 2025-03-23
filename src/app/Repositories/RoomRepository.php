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


    public function getAvailableRooms(int $hotelId){
        return Room::where('hotel_id', $hotelId)->where('availability_status', true)->get();
    }

    public function createRoom(array $room){

        return Room::create($room);
    }

    public function alterAvailability(int $roomId){
        $room = Room::findOrFail($roomId);
        $room->update(['availability_status' => !$room->availability_status]);
        return $room;
    }

}
