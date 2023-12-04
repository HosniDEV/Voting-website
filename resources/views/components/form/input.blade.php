@props(['name','type'=>'text','placeholder'=>'','value'=>''])


<input name='{{$name}}' type="{{$type}}" placeholder="{{$placeholder}}" value="{{$value .old($name)}}"
class="w-full bg-inputColor py-2 rounded-lg px-3 placeholder:text-black placeholder:text-sm focus:outline-buttonColor focus:outline">
<x-form.error name={{$name}}>
</x-form.error>
