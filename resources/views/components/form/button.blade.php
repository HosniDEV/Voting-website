@props(["name"])
<button {{$attributes->merge(['class'=>"w-full bg-buttonColor text-white  py-2 rounded-lg px-3 placeholder:text-black placeholder:text-sm focus:outline-buttonColor focus:outline"])}}>{{$name}}</button>
