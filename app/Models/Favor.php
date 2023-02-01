<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Favor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cost',
        'sending_point',
        'destination_point'
    ];

    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'favor_customers');
    }
}
