
<div class=" h-full ">
    <ul class="space-y-4  w-[145px]">
        <li class="  py-3  rounded-lg text-font font-bold  text-black    "><a href="{{route('vote.index')}}"> <img
                    src="{{ asset('images/logo.png') }}" alt="" class="w-[60px] cursor-pointer mx-auto"></a></li>
        <li
            class="px-2 py-2 rounded-lg text-font font-bold  text-black  border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor  ">
            <a href="{{route('admin.dashaboard')}}">show all ideas  </a></li>
        <li
            class="px-2 py-2 rounded-lg text-font font-bold  text-black  border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor  ">
            <a href="{{route('admin.category')}}">Categories</a></li>
        <li
            class="px-2 py-2 rounded-lg text-font font-bold  text-black  border-r border-r-redColor border-l border-l-blueColor border-b border-b-yellowColor border-t border-t-greenColor  ">
            <a href="{{route('admin.user')}}">users</a></li>

    </ul>
</div>
