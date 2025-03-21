<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;
use App\Models\Hotel;
use App\Services\HotelService;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function __construct(protected HotelService $hotelService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->hotelService->getAll(),
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelStoreRequest $request)
    {
        $validated = $request->validated();

        return response()->json($this->hotelService->store($validated), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $hotel)
    {
        return response()->json($this->hotelService->show($hotel));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelUpdateRequest $request, int $hotel)
    {
        return response()->json($this->hotelService->update($request->validated(), $hotel));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $hotel)
    {
        return $this->hotelService->delete($hotel);
    }
}
