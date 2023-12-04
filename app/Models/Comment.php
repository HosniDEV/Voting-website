<?php

namespace App\Models;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['user_id','vote_id','comment'];

    public function vote(){
        return $this->belongsTo(Vote::class,'vote_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
