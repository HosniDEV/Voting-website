
@props(["count",'closed','inprogress'])
    <div class=" group  flex justify-between items-center">
       <div class=" space-x-1 text-sm  text-inputColor    pb-3 border-b-4 border-inputColor">
          <a href="{{route('vote.index')}}" class="border-b-4 border-buttonColor pb-3 text-black ">All IDEAS({{$count}})</a>

       </div>
       <div class=" space-x-1 text-sm  text-inputColor    pb-3 border-b-4 border-inputColor">
          <a href="{{route('vote.inprogress')}}" class="border-b-4 hover:border-buttonColor pb-3 focus:text-black   hover:text-black  ">IN PROGRESS ({{$inprogress}})</a>
          <a href="{{route('vote.closed')}}" class="border-b-4 hover:border-buttonColor pb-3 focus:text-black   hover:text-black">ClOSED ({{$closed}})</a>
       </div>

    </div>

