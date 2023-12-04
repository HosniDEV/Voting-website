@props(["vote"])
<div class="flex items-start space-x-2">
    <div class="h-[50px]  w-[50px] ">
        <img src="{{auth()->user() ? asset('storage/'.auth()->user()->picture):'/images/1.png' }}" alt=""
            class="w-full flex-shrink-0 h-full object-cover object-center rounded-full">
    </div>

<form action="{{route('comment.store',$vote->id)}}" method="POST" class="flex-grow  flex justify-between   bg-cardColor shadow-md   border border-collapse rounded-lg  ">
    @csrf
    <input  name='comment'type="text" class="focus:outline-none border border-yellowColor  rounded-lg  px-3 py-3 w-full">
    {{-- <button class="absolute right-3 bottom-0    py-1 rounded "><i class="fa-solid fa-share text-lg text-yellowColor"></i></button> --}}
</form>

</div>

