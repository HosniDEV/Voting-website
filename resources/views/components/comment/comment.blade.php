@props(['vote'])
<div class=" relative ml-20 rounded-lg mb-3 flex justify-between space-x-3  bg-cardColor shadow-md  py-4 border border-collapse  border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor ">
   <div class="before:absolute  before:-left-5 before:w-[2px] before:h-36  last:h-30 before:-top-3  before:bg-buttonSeondColor"></div>
   <div class="absolute top-5 -left-8 bg-buttonSeondColor h-[3px] w-4"></div>
   <div class="px-3  flex justify-between flex-grow space-x-2  ">
       <div class=" flex-shrink-0 w-[60px] h-[60px]">
       <img src="{{$vote->user->picture? asset('storage/'.$vote->user->picture):'/images/1.png' }}" alt=""    class="w-full h-full object-cover object-center rounded-lg">
       </div>
       <div class="  flex-grow space-y-1 ">
          {{-- <h1 class="text-lg font-medium font-sans uppercase"><a href="{{route('vote.show',['vote'=>$vote->id])}}">{{$vote->title}}</a></h1> --}}
          <p class="line-clamp-3  text-sm font-sans font-tight">{{$vote->comment}}</p>
        <div class="flex justify-between items-center">
             <h1 class="text-sm font-bold font-sans text-slate-600 capitalize">
            @auth
            @if (auth()->user()->id==$vote->user->id)
              me
            @else
            {{ucwords($vote->user->name)}}
            @endif
            @endauth
            @guest
            {{ucwords($vote->user->name)}}
            @endguest



             <span class="text-slate-400 font-light ">{{$vote->created_at->diffForHumans()}} </span>
            </h1>
             <div class="mt-2">

               <div x-data="{ open: false }" class="inline relative ">
                  <button @click="open= !open" class="px-4 text-sm py-1 rounded-full inline bg-buttonSeondColor"><i class="fa-solid fa-ellipsis"></i>
                  </button>


                @auth
                    @if (auth()->user()->id==$vote->user->id)
                    <div x-show='open' class="absolute -right-16 -bottom-13  bg-buttonSeondColor rounded-lg px-3 py-2  hover:border hover:border-redColor duration-500 ease-in-out text-redColor" style="display: none">
                     <form action="{{route('comment.delete',['vote'=>$vote->id])}}"  method='POST'>
                        @method('DELETE')
                             @csrf
                             <button type="submit">delete</button>
                         </form>
                  </div>
                    @else

                    @endif
                @endauth



               </div>

             </div>
        </div>
        </div>
    </div>
 </div>
