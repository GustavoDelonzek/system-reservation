<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomStoreRequest;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function __construct(protected RoomService $roomService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->roomService->allRooms();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomStoreRequest $request, int $hotel)
    {
        $room = $this->roomService->store($request->validated(), $hotel);
        return response()->json($room, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
