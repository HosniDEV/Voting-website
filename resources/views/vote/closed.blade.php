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
                @if ($votes->count()> 0)

                     @foreach ($votes as  $vote)
                     @if ($vote->status==0)
                     <x-card :vote='$vote'>
                     </x-card>
                     @endif
                   @endforeach

                @else
                 <h1 class="text-center text-red-500">no  such a post here</h1>
                @endif
            </div>
        </div>

        </div>
    </x-container>
@endsection
