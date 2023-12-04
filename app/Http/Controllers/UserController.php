<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  //show form
  public function registre(){
    return view('auth.signUp');
}

//store function
public function signup(Request $request){
 $formField=$request->validate([
  'name'=>'required',
  'email'=>['required',Rule::unique('users','email')],
  'password'=>['required','confirmed','min:4','max:10'],

 ]);
 $user=User::create($formField);
 auth()->login($user);
 return redirect()->route('vote.index')->with('messsage','successfully added ');
}

 // show sign in form
 public function login()
 {
   return view('auth.signIn');
 }
 //Store user sign in form
 public function signin(Request $request)
 {
   $formField = $request->validate([
     'email' => ['required', 'email',Rule::exists('users','email')],
     'password' => ['required', 'min:4',],
   ]);
   //   to check if the user already exist or no in database
   if (auth()->attempt($formField)) {
     $request->session()->regenerate();
     return redirect()->route('vote.index')->with('message', 'logged successfully');
   }
   return back()->withErrors(['email' => 'Something wrong with ur password | email'])->onlyInput('email');
 }



 // logout

 public function logout()
  {
    auth()->logout();
    // $request->session()->invalidate();
    // $request->session()->regenerateToken();
    return  back();
  }

  //edit user
  public function edit(User $user){
    return view('auth.edit')->with('user',$user);
  }
  public function update(Request $request,User $user){
    $formField=$request->validate([
      'name'=>'required',
      'email'=>['required',],
      'password'=>['required','min:4','max:10'],
     ]);
//      if($request->hasFile('image')){
//       $formField['image'] = $request->file('image')->store('images','public');
//   }
     if($request->hasFile('picture')){
      $formField['picture']=$request->file('picture')->store('images','public');
     }
    $user->update($formField);
    //  auth()->login($use);
     return redirect()->route('vote.index')->with('messsage','updated successfully  ');
  }

  //delete account
  public function destroy(User $user){
    if(auth()->user()){
      $user->delete();
      return redirect()->route('vote.index')->with('message', 'deleted successfully');
   }
   return back()->with('message', 'you are not signed in ');
    }
}

