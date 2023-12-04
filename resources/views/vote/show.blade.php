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

            <div class="col-span-2 space-y-4  ">
                <x-search :count="$vote->count()" :closed="$vote->where('status',0)->count()" :inprogress="$vote->where('status',1)->count()">

                </x-search>

                <x-detail-card :vote='$vote'>
                </x-detail-card>
                <div class=" px-3 flex justify-between items-center">
                    <button class="bg-buttonColor text-base py-2 px-8 rounded-lg text-white">Reply</button>
                    <div class="flex  items-center space-x-3">
                        <div class="bg-buttonColor text-base   px-4 rounded-lg text-white">
                            <Strong class="text-white  block  py-2">{{$vote->likes->count()}}</Strong>
                        </div>

                        @auth
                        @if ($vote->likes->contains('user_id', auth()->user()->id))
                        <button class="bg-buttonSeondColor text-base py-2 px-8 rounded-lg text-white">Voted</button>
                    @else
                        <form action="{{ route('vote.like', $vote->id) }}" method="post">
                            @csrf
                            <button class="bg-buttonColor text-base py-2 px-8 rounded-lg text-white">Vote</button>
                        </form>
                    @endif
                        @endauth
                  @guest
                  <button class="bg-buttonColor text-base py-2 px-8 rounded-lg text-white">Vote</button>
                  @endguest

                    </div>
                </div>

                <x-comment.form :vote='$vote'>
                </x-comment.form>

                @foreach ($vote->comments as $comment)
                    <x-comment.comment :vote='$comment'>
                    </x-comment.comment>
                @endforeach
            </div>
        </div>

        </div>
    </x-container>
@endsection
