@extends('master.layout')
@section('title')
    HOME
@endsection

@section('body')
<x-navbar>
</x-navbar>
{{-- flash message --}}
<x-flash-message>
</x-flash-message>

    <x-container>
        <div class="grid grid-cols-3 gap-4">
            <x-vote-form :categories='$categories'>
            </x-vote-form>

            <div class="col-span-2 space-y-4 ">
               <x-search :count="$votes->count()" :closed="$votes->where('status',0)->count()" :inprogress="$votes->where('status',1)->count()">
               </x-search>
               <div class="flex gap-4 ">
                <select name="category_id" id=""
                class=" bg-inputColor py-2 rounded-lg px-3 placeholder:text-black placeholder:text-sm focus:outline-buttonColor focus:outline">
                @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="text-sm bg-inputColor py-2 px-3 rounded-lg">
                            {{ $category->category }}</option>
                    @endforeach
                @else
                    <option value="" class="text-sm bg-inputColor py-2 px-3 rounded-lg">no category</option>
                @endif

            </select>
            <form action="{{route('vote.index')}}" method="get" class="flex-grow">
                @csrf
               <x-form.input name='search'  placeholder="searching.......">
               </x-form.input>
            </form>
               </div>
                @if ($votes->count()> 0)
                     @foreach ($votes as  $vote)
                       <x-card :vote='$vote'>
                       </x-card>
                     @endforeach
                @else
                 <h1 class="text-center text-red-500">no  such a post here</h1>
                @endif
            </div>
        </div>

        </div>
    </x-container>
@endsection
