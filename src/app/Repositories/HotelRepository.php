<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository{

    public function getAll(){
        return Hotel::with('rooms')->get();
    }

    public function createHotel(array $data){
       return Hotel::create(
            $data
        );
    }

    public function updateHotel(array $data,int $id){
        $hotel = Hotel::findOrFail($id);
        $hotel->update($data);
        return $hotel;
    }

    public function getHotelById(int $id){
        return Hotel::findOrFail($id)->load('rooms');
    }

    public function deleteHotel(int $id){
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return response(status:204);
    }

    public function filter(array $data){
        return Hotel::where('location', $data['location'])->get();
    }


}
