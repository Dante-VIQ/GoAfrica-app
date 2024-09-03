<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\City;
use App\Models\About;
use App\Models\Doctor;
use App\Models\Header;
use App\Models\Feature;
use App\Models\Service;
use App\Models\Destination;
use App\Models\Testimonial;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const ROLE_ADMIN = 'admin';
    // const ROLE_USER = 'user';
    const ROLE_MASTER = 'master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ['profile_photo_url'];

    // Relationship With services
    public function services()
    {
        return $this->hasMany(Service::class, 'user_id');
    }

    // Relationship With doctors
    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'user_id');
    }

    // Relationship With testimonial
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'user_id');
    }

    // Relationship With About
    public function abouts()
    {
        return $this->hasMany(About::class, 'user_id');
    }

    // Relationship With Headers
    public function headers()
    {
        return $this->hasMany(Header::class, 'user_id');
    }

    // Relationship With About
    public function features()
    {
        return $this->hasMany(Feature::class, 'user_id');
    }

    // Relationship With Blog
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }

    // Relationship With Destination
    public function destinations()
    {
        return $this->hasMany(Destination::class, 'user_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'user_id');
    }
    public function isAdmin()
    {
        if ($this->role != self::ROLE_ADMIN) {
            return false;
        }

        return true;
    }

    public function isMaster()
    {
        if ($this->role != self::ROLE_MASTER) {
            return false;
        }

        return true;
    }
}
