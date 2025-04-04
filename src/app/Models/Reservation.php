<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status',
    ];

    public function room():BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

}
