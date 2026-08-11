<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title',
        'issuer',
        'issued_at',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'issued_at' => 'date',
        ];
    }
}
