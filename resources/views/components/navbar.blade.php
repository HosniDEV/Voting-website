<header class="px-40 py-3  sticky w-full top-0 bg-slate-50 bg-opacity-10">
    <nav class="flex justify-between items-center">
        <img src="{{ asset('images/logo.png') }}" alt="" class="w-[40px] cursor-pointer">
        <div class="flex space-x-3 items-center">
            @auth

             <h1 class="text-base text-buttonColor font-bold rounded-full px-3 py-1  border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor ">{{ucwords(auth()->user()->name)}}</h1>
                {{-- <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="text-base  font-semibold hover:text-buttonColor first-letter:uppercase">
                        logout</button>
                </form> --}}

                <div x-data="{ open: false }" class="inline relative ">
                   <img   @click=" open = !open" src="{{auth()->user()->picture? asset('storage/'.auth()->user()->picture):'/images/1.png' }}" alt="" class="w-[40px] h-[40px] rounded-full object-cover object-center cursor-pointer">
                  @auth
                      <div x-show='open' class="absolute -right-20 -bottom-13  bg-buttonSeondColor rounded-lg w-32    hover:border hover:border-buttonColor" style="display: none">
                        <div class="w-full ">
                            <a href="{{route('user.edit',['user'=>auth()->user()->id])}}" class="line-clamp-1 px-3 py-1 hover:bg-buttonColor hover:text-white">Edit Profile</a>
                             @if (auth()->user()->email=='hosni@gmail.com')
                             <a href="{{route('admin.dashaboard')}}" class="line-clamp-1 px-3 py-1 hover:bg-buttonColor hover:text-white">dashboard</a>
                             @else

                             @endif

                            <form action="{{ route('user.logout') }}" method="post" class="w-full px-3 line-clamp-1  py-1 hover:bg-buttonColor hover:text-white">
                                @csrf
                                <button type="submit" class="">
                                    logout</button>
                            </form>
                        </div>
                    </div>
                  @endauth

                 </div>
                <div class="relative">

                </div>
            @endauth
            @guest
            <a href="{{route("user.registre")}}" class=" bg-white  py-1 px-4 text-black rounded-full text-base  font-semibold hover:bg-inputColor duration ease-in transition  cursor-pointer first-letter:uppercase  border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor">
                Registre</a>
            <a href="{{route("user.login")}}" class=" bg-white  py-1 px-4 text-black rounded-full  text-base  font-semibold hover:bg-inputColor duration ease-in transition  cursor-pointer first-letter:uppercase  border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor">
                login</a
            @endguest
        </div>
    </nav>
</header>
