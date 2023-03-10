<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'status',
        'category',
        'email'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }
}
