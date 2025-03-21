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
        return $this->hotelRepository->store($data);
    }

    public function update($data, $id){
        return $this->hotelRepository->update($data, $id);
    }

    public function show(int $id){
        return $this->hotelRepository->show($id);
    }

    public function delete(int $id){
        return $this->hotelRepository->delete($id);
    }



}



