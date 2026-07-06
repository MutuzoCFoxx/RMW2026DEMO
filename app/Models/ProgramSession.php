<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_date', 'start_time', 'end_time', 'title', 'description',
        'session_type', 'venue_hall', 'speaker_name', 'sort_order',
    ];

    protected $casts = [
        'session_date' => 'date',
    ];
}
