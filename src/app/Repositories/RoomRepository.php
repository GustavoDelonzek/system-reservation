<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository{


    public function getAllRooms(){
        return Room::all();
    }

    public function createRoom(array $room){

        return Room::create($room);
    }

    /*public function updateRoom(int $id,array $updatingRoom){
        $room = Room::findOrFail($id)->first();
        return $room->update($updatingRoom);
    }*/


}
