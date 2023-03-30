<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Listing;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // relationship with listing
    public function listings()
    {
        return $this->hasMany(Listing::class, 'user_id');
    }
}
/*
start working with tinker:
start with :php artisan tinker
then we can use the following commands:
App\Models\User::all() // to get all users
App\Models\User::find(1) // to get a single user
App\Models\User::find(1)->listings // to get all listings of a single user
App\Models\User::find(1)->listings()->create([
    'title'=>'test title',
    'company'=>'test company',
    'location'=>'test location',
    'description'=>'test description',
    'tags'=>'test tags',
    'email'=>'test email',
    'website'=>'test website',
    'logo'=>'test logo'])
    // to create a listing for a single user
$firstUser = App\Models\User::find(1)
$firstUser->listings() // to get all listings of a single user
*/
