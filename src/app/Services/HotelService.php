<?php

namespace App\Services;

use App\Repositories\HotelRepository;

class HotelService{
    public function __construct(protected HotelRepository $hotelRepository)
    {
    }

    public function getAll(){
        return $this->hotelRepository->getAll();
    }

    public function store($data){
        return $this->hotelRepository->createHotel($data);
    }

    public function update($data, $id){
        return $this->hotelRepository->updateHotel($data, $id);
    }

    public function show(int $id){
        return $this->hotelRepository->getHotelById($id);
    }

    public function delete(int $id){
        return $this->hotelRepository->deleteHotel($id);
    }



}



