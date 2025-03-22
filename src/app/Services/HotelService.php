<?php

namespace App\Services;

use App\Repositories\HotelRepository;
use App\Repositories\UserRepository;
use Exception;

class HotelService{
    public function __construct(protected HotelRepository $hotelRepository, protected UserRepository $userRepository)
    {
    }

    public function getAll(){
        return $this->hotelRepository->getAll();
    }

    public function store(array $data, int $user){
        if(!$this->userRepository->is_admin($user)){
            throw new Exception("You are not allowed to create a hotel");
        };
        return $this->hotelRepository->createHotel($data);
    }

    public function update(array $data, int $id, int $user){
        if(!$this->userRepository->is_admin($user)){
            throw new Exception("You are not allowed to update a hotel");
        };
        return $this->hotelRepository->updateHotel($data, $id);
    }

    public function show(int $id){
        return $this->hotelRepository->getHotelById($id);
    }

    public function delete(int $id){
        return $this->hotelRepository->deleteHotel($id);
    }



}



