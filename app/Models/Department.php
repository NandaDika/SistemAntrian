<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'code',
    'name',
    'queue_prefix',
    'room_name',
    'current_queue',
    'is_registration',
    'is_payment_gateway',
    'is_active',
    'description',
])]

class Department extends Model
{
    protected function casts(): array
    {
        return [
            'is_registration' => 'boolean',
            'is_payment_gateway' => 'boolean',
            'is_active' => 'boolean',
            'current_queue' => 'integer',
        ];
    }
}
