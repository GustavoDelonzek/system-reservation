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
    public function index(int $hotel)
    {
        return response()->json($this->roomService->availableRooms($hotel));
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
    public function show(int $room)    {
        $room = $this->roomService->show($room);
        return response()->json($room, 200);
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
