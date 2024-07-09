<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'detail', 'images'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
