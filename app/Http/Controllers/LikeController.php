<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //


    public function like(Vote $vote){


           if($vote->status==0){
            return back()->with('message','this post is closed so u cannot vote');
           }
           $vote->likes()->create([
            'user_id'=>auth()->user()->id,
        ]);

            return back()->with('message','voted');

    }
}
