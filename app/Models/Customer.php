<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'date_of_deal',
        'deadline',
        'status_of_deal'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function favors(): BelongsToMany
    {
        return $this->belongsToMany(Favor::class, 'favor_customers');
    }
}
