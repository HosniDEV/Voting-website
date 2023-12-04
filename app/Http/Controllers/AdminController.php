<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(){
      return view('admin.dahsborad')->with([
          'votes'=>Vote::paginate(7),
          'count'=>Vote::count(),
          'users'=>User::count(),
          'comments'=>Comment::count(),
          'categories'=> Category::all(),
      ]);
   }

public function users(){
   return view('admin.users')->with([
      'usess'=>User::all(),
      'count'=>Vote::count(),
      'users'=>User::count(),
      'comments'=>Comment::count(),
      'categories'=> Category::all(),
  ]);
}

      public function category(){
         return view('admin.categories')->with([
            'categories'=>Category::paginate(7),
            'count'=>Vote::count(),
            'users'=>User::count(),
            'comments'=>Comment::count(),
        ]);
      }


      public function store(Request $request ,){
          $formField=$request->validate([
            'category'=>'required|unique:categories,category',
          ]);
          Category::create($formField);
         return back();
      }

    //   Destory category
      public function destroy(Category $category){
          $category->delete();
         return back();
      }
}

