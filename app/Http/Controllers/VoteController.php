<?php

namespace App\Http\Controllers;

use LDAP\Result;
use App\Models\Vote;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoteController extends Controller
{


    public function index(){
        return view('vote.index')->with([
            'votes'=>Vote::latest()->filter(request(['search']))->get(),
            'categories'=> Category::all(),
        ]);
    }
    public function closed(){
        return view('vote.closed')->with([
            'votes'=>Vote::latest()->get(),
            'categories'=> Category::all(),
        ]);
    }
    public function inprogress(){
        return view('vote.inprogress')->with([
            'votes'=>Vote::latest()->get(),
            'categories'=> Category::all(),
        ]);
    }

    //create a vote
    // public function create(){

    // }
    public function store(Request $request,){

      if(auth()->user()){
        $formField=$request->validate([
          'title'=>'required|min:8',
          'content'=>'required',
          'category_id'=>['required',Rule::exists('categories','id')],
        ]);
        $formField['user_id']=auth()->user()->id;
        if($request->hasFile('image')){
           $formField['image'] = $request->file('image')->store('images','public');
       }
     Vote::create($formField);
     return back()->with('message','posted successfully');
      }
   return back()->with('message', 'you are not signed in ');
    }


    //delete vote
    public function destroy(Vote $vote){
      if(auth()->user()){
        $vote->delete();
        return back()->with('message', 'deleted successfully');
     }
     return back()->with('message', 'you are not signed in ');
      }

      //show a single a vote
      public function show(Vote $vote){
        return view('vote.show')->with([
          'vote'=>$vote,
          'categories'=> Category::all(),

        ]);
      }

      //edit status
      public function status(Vote $vote){
        if(auth()->user())
        {
          if($vote->status==1){
            $vote->update([
              "status"=>0,
            ]);
           }else{
            $vote->update([
              "status"=>1,
            ]);
           }
           return back();
        }
   return  back()->with('message','sorry u cannot try another time');
      }
}
