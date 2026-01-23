<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    // Colonnes autorisées en assignement de masse
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'status',
        'photo1',
        'photo2',
        'photo3',
    ];

    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}