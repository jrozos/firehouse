<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone_number',
        'description',
        'created_by',
        'modified_by'
    ];
    protected static function boot()
    {
        parent::boot();

        // Attach an event listener to the creating and updating events
        static::creating(function ($artist) {
            $user = auth()->user(); // Get the currently authenticated user
            $artist->created_by = $user->id;
            $artist->updated_by = $user->id;
        });

        static::updating(function ($artist) {
            $user = auth()->user(); // Get the currently authenticated user
            $artist->updated_by = $user->id;
        });
    }
}
