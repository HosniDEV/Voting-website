<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use App\Models\Vote;
use App\Models\Category;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture'
    ];
//  Str::contains($haystack, 'needles')
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
        'password' => 'hashed',
    ];

//  each user can post one or many  vote
    public function votes(){
        return $this->hasMany(Vote::class , 'user_id');
    }
// //  each user can create one or many   category
// public function categories(){
//     return $this->hasMany(Category::class ,'category_id');
// }
public function comments(){
    return $this->hasMany(Comment::class , 'user_id');
}

public function likes(){
    return $this->hasMany(Like::class , 'user_id');
}

}
