<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Number extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'number',
        'status',
    ];

    protected $rules = [
        'number' => 'min:8|max:14'
    ];

    protected $attributes = [
        'status' => 'active'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function numberPreferences(): HasMany
    {
        return $this->hasMany(NumberPreferences::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($number) {
            $number->numberPreferences()->delete();
        });
    }

}
