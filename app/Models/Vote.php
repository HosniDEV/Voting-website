<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;

    protected $fillable=['title','user_id','category_id','image','content','status'];

    public function scopeFilter($query,array $filters){
        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')
            ->OrWhere('content','like','%'.request('search').'%');
            // ->OrWhere('category->category','like','%'.request('search').'%');
        }
        }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function comments(){
        return $this->hasMany(Comment::class,'vote_id');
    }

    public function likes(){
        return $this->hasMany(Like::class,'vote_id');
    }
}
