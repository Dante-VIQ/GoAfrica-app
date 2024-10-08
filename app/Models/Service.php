<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'category'];

    // Relationship To User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
