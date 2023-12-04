@extends('master.layout')
@section('title')
    Sign up
@endsection
@section('body')
     <div class="h-screen  flex justify-center items-center">
            <x-reusableCard class="  p-4 space-y-4 w-[350px]  border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor">
              <form action="{{route('user.signup')}}" method="post" class="space-y-4">
                @csrf
                <img src="{{asset('images/logo.png')}}" alt="" width="50px" height="" class="mx-auto">
                <x-form.input name='name' placeholder='type your title'>
                </x-form.input>

                <x-form.input name='email' type="email" placeholder='type your email'>
                </x-form.input>
                <x-form.input name='password' type="password" placeholder='type your password'>
                </x-form.input>
                <x-form.input name='password_confirmation' type="password" placeholder='type your password'>
                </x-form.input>

                <x-form.button name='Sign up'>
                </x-form.button>
                <div class="flex justify-between items-baseline">
                     <span class="text-xs font-semibold ">Already have an account ?</span>
                     <a href="{{route('user.login')}}" class="text-base font-normal text-buttonColor">sign in</a>
                    </div>
              </form>
           </x-reusableCard>
     </div>
@endsection
