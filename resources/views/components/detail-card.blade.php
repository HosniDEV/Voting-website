@props(['vote'])
<div class=" px-3 rounded-lg  flex justify-between space-x-3  bg-cardColor shadow-md  py-4 border border-collapse">

    <div class=" flex justify-between flex-grow space-x-2  ">
       <div class=" flex-shrink-0 w-[60px] h-[60px]">
       <img src="{{$vote->image? asset('storage/'.$vote->image):'/images/2.jpg'}}" alt=""    class="w-full h-full object-cover object-center rounded-lg">
       </div>
       <div class="  flex-grow space-y-3  ">
          <h1 class="text-lg font-medium font-sans uppercase"><a href="{{route('vote.show',['vote'=>$vote->id])}}">{{$vote->title}}</a></h1>
          <p class=" text-sm font-sans font-tight">{{$vote->content}}  <br><span class="font-medium text-buttonColor"> idea by {{$vote->user->name}}</span></p>
        <div class="flex justify-between items-center">
          <div class="flex  items-baseline  font-light   font-sans text-slate-600 space-x-1">
            <span class="text-base">{{$vote->created_at->diffForHumans()}}</span>
             <small class="text-base">
               @if ($vote->comments->count()==0)
               comment
           @else
           {{$vote->comments->count()}} {{Str::plural('comment',$vote->comments->count())}}
           @endif</small>
           <span class="text-base  font-semibold ">{{$vote->category->category}}</span>
         </div>
             <div class="mt-2">
                <button class="px-4 text-sm py-1 rounded-full inline bg-buttonSeondColor">
                  @if ($vote->status==1)
                  <span class="text-greenColor">open</span>
                @else
                <span class="text-redColor">closed</span>
                @endif</button>

               <div x-data="{ open: false }" class="inline relative ">
                  <button @click="open= !open" class="px-4 text-sm py-1 rounded-full inline bg-buttonSeondColor"><i class="fa-solid fa-ellipsis"></i>
                  </button>
                @auth
                    @if (auth()->user()->id==$vote->user->id)
                    <div x-show='open' class="absolute -right-20 -bottom-13  bg-buttonSeondColor rounded-lg px-6 py-3  hover:border hover:border-buttonColor" style="display: none">
                     <form action="{{route('vote.destroy',["vote"=>$vote->id])}}"method='POST'>
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
