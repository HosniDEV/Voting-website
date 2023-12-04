@extends('master.layout')
@section('title')
    Edit
@endsection
@section('body')
    <div class="h-screen  flex justify-center items-center bg-cover bg-center bg-[url('https://c4.wallpaperflare.com/wallpaper/129/45/311/left-right-brain-wallpaper-preview.jpg')]">
        <x-reusableCard class=" relative  p-4   border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor">
            <form action="{{route("user.destroy",['user'=>auth()->user()->id])}}"method='POST' class="absolute  rotate-90 -right-24 top-14 w-[144px] ">
                @method('DELETE')
                     @csrf
                     <x-form.button name='delete account' class="bg-white text-redColor">
                    </x-form.button>
                 </form>
                 <img src="{{$user->picture? asset('storage/'.$user->picture):'/images/2.jpg'}}" alt="" class="h-[100px] object-cover object-center w-[100px] rounded-full  absolute -top-12  border-r- ring-2 border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor">
            <div class="flex items-center">
               <div class="h-full">
                <img src="{{asset('/images/3.jpg')}}" alt="" width="300px" class='h-full'>
               </div>
               <form action="{{route('user.update',['user'=>auth()->user()->id])}}" method="POST" class="w-[300px] space-y-4" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <img src="{{ asset('images/logo.png') }}" alt="" width="50px" height="" class="mx-auto"> --}}
                <x-form.input name='name' value='{{$user->name}}'>
                </x-form.input>


                <x-form.input name='email' type="email" value='{{$user->email}}'>
                </x-form.input>
                {{-- <x-form.input name='picture' type='file' value='{{$user->email}}'>

                </x-form.input> --}}
                <div class="w-full  flex justify-between">
                    <label for="file" class="bg-inputColor py-2  flex-grow
                     rounded-md  font-medium font-sans text-base text-center"><i
                     class="fa-solid fa-paperclip text-black text-sm inline"></i>  Attach</label>
                    <input name='picture' type="file" id="file" class="hidden">
                </div>


                <x-form.input name='password'  type='password'>
                </x-form.input>

        <x-form.button name='edit'>
        </x-form.button>



{{--
                <div class="flex justify-between items-baseline">
                    <span class="text-xs font-semibold ">Dont have an account ?</span>
                    <a href="{{route('user.registre')}}" class="text-base font-normal text-buttonColor">sign up</a> --}}
                {{-- </div> --}}
            </form>
          </div>

        </x-reusableCard>

    </div>
@endsection
