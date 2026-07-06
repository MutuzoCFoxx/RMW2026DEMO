<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'job_title', 'organization', 'bio', 'photo_url', 'country', 'is_keynote', 'sort_order',
    ];

    protected $casts = [
        'is_keynote' => 'boolean',
    ];
}
