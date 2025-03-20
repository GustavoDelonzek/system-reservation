<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository{

    public function getAll(){
        return Hotel::with('rooms')->get();
    }

    public function store(array $data){
       return Hotel::create(
            $data
        );
    }

    public function update(array $data,int $id){
        $hotel = Hotel::findOrFail($id);
        $hotel->update($data);
        return $hotel;
    }

    public function show(int $id){
        return Hotel::findOrFail($id)->load('rooms');;
    }



}
