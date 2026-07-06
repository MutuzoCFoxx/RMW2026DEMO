<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference', 'full_name', 'email', 'phone', 'organization', 'job_title', 'country',
        'delegate_type', 'ticket_type', 'amount', 'payment_method', 'payment_status',
        'payment_reference', 'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public const TICKET_PRICES = [
        'standard' => 150000,           // RWF
        'vip' => 350000,                // RWF
        'exhibitor_package' => 500000,  // RWF
        'media' => 0,                   // RWF - complimentary
    ];

    public static function priceFor(string $ticketType): int
    {
        return self::TICKET_PRICES[$ticketType] ?? self::TICKET_PRICES['standard'];
    }

    public function getRouteKeyName(): string
    {
        return 'reference';
    }
}
