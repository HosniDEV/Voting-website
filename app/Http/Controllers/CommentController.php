<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Http\Request;

class CommentController extends Controller
{







    // add comment
 public function store(Request $request,Vote $vote){

    if(auth()->user()){
        if($vote->status==1){
            $formFiled=$request->validate([
                'comment'=>'required',
            ]);
            $formFiled['user_id']=auth()->user()->id;
          $vote->comments()->create($formFiled);
          return back();
        }else{
            return back()->with('message','sorry this post is closed');
        }
        }
    return back()->with('message','u are not sign in ');
 }


//  Destroy comment

public function destroy(Comment $vote){
    $vote->delete();
    return back()->with('message','deleted successfully');

}



}
