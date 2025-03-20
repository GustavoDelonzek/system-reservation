<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository{

    public function getAll(){
        return Hotel::with('rooms')->get();
    }

    public function store($data){
       return Hotel::create(
            $data
        );
    }

    public function update($data, $id){
        $hotel = Hotel::findOrFail($id);
        $hotel->update($data);
        return $hotel;
    }



}
