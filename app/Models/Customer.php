<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $rules = [
        'document' => 'min:6|max:12'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'document',
        'status'
    ];

    protected $attributes = [
        'status' => 'new'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function numbers(): HasMany
    {
        return $this->hasMany(Number::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($customer) {
            $customer->numbers()->with('numberPreferences')->get()->each(function ($number) {
                $number->numberPreferences()->delete();
            });
            $customer->numbers()->delete();
        });
    }

}
