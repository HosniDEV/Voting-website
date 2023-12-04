@props(['vote'])
<div class="rounded-lg  flex justify-between space-x-3  bg-cardColor shadow-md  py-4 border border-collapse">
    <div {{ $attributes->merge(['class' => 'flex flex-col items-center  justify-center px-3 ']) }}>
        <h1>{{ $vote->likes->count() }}</h1>
        <h3>{{ Str::plural('vote', $vote->likes->count()) }}</h3>

        @auth
        @if ($vote->likes->contains('user_id', auth()->user()->id))
        <button
            class="bg-buttonSeondColor px-4 py-2 rounded-lg  mt-3 text-button text-sm font-sans font-light">Voted</button>
    @else
        <form action="{{ route('vote.like', $vote->id) }}" method="post">
            @csrf
            <button
                class="bg-buttonColor px-4 py-2 rounded-lg  mt-3 text-white text-sm font-sans font-light">Vote</button>
        </form>
    @endif
        @endauth
  @guest
  <button
  class="bg-buttonColor px-4 py-2 rounded-lg  mt-3 text-white text-sm font-sans font-light">Vote</button>
  @endguest


    </div>

    <div class="pr-3 flex justify-between  flex-grow space-x-2  ">

        <div class="flex-shrink-0 w-[60px] h-[60px]">
            <img src="{{ $vote->image ? asset('storage/' . $vote->image) : '/images/2.jpg' }}" alt=""
                class="w-full h-full object-cover object-center rounded-lg">
        </div>


        <div class=" flex-grow space-y-3  ">
            <h1 class="text-lg font-medium font-sans uppercase"><a
                    href="{{ route('vote.show', ['vote' => $vote->id]) }}">{{ $vote->title }}</a></h1>
            <p class="line-clamp-3  text-sm font-sans font-tight ">{{ $vote->content }}</p>
            <div class="flex justify-between items-center">
                <div class="flex  items-baseline  font-light   font-sans text-slate-600 space-x-2">

                    <span class="text-base">{{ $vote->created_at->diffForHumans() }}</span>
                    <small class="text-base">
                        @if ($vote->comments->count() == 0)
                            comment
                        @else
                            {{ $vote->comments->count() }} {{ Str::plural('comment', $vote->comments->count()) }}
                        @endif
                    </small>
                    <span class="text-base  font-semibold ">{{ $vote->category->category }}</span>
                </div>
                <div class="mt-2">

                    @auth
                        @if (auth()->user()->id == $vote->user->id)
                            <form action="{{ route('vote.status', $vote->id) }}" method="post" id="status"
                                class="inline">
                                @method('PUT ')
                                @csrf
                                <button class="px-4 text-sm py-1 rounded-full inline bg-buttonSeondColor" id='status'>
                                    @if ($vote->status == 1)
                                        <span class="text-greenColor">open</span>
                                    @else
                                        <span class="text-redColor ">closed</span>
                                    @endif
                                </button>
                            </form>
                        @else
                            <button class="px-4 text-sm py-1 rounded-full inline bg-buttonSeondColor" id='status'>
                                @if ($vote->status == 1)
                                    <span class="text-greenColor">open</span>
                                @else
                                    <span class="text-redColor">closed</span>
                                @endif
                            </button>
                        @endif
                    @endauth


                    <div x-data="{ open: false }" class="inline relative ">
                        <button @click="open= !open"
                            class="px-4 text-sm py-1 rounded-full inline bg-buttonSeondColor"><i
                                class="fa-solid fa-ellipsis"></i>
                        </button>
                        @auth
                            @if (auth()->user()->id == $vote->user->id)
                                <div x-show='open'
                                    class="absolute -right-20 -bottom-13  bg-buttonSeondColor rounded-lg px-6 py-3  hover:border hover:border-buttonColor"
                                    style="display: none">
                                    <form action="{{ route('vote.destroy', ['vote' => $vote->id]) }}"method='POST'>
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
