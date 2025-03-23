<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function __construct(protected ReservationService $reservationService)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->reservationService->allReservations(Auth::id()));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request, int $hotel)
    {
        $validated = $request->validated();
        return response()->json($this->reservationService->store($validated, $hotel, Auth::id()));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $reservation)
    {
        return response()->json($this->reservationService->show($reservation));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
