@extends('master.layout')
@section('title')
    HOME
@endsection

@section('body')
    <x-flash-message>
    </x-flash-message>

    <x-container class="mt-0 h-screen px-0 py-0">
        <div class="flex flex-between gap-4  items-start h-full">
            <x-admin.sidebar>
            </x-admin.sidebar>

            <div class="h-screen   bg-cardColor shadow-sm  border-l-0 py-4 border border-gray-100 border-y-0  flex-grow ">
                <div class=" flex flex-col p-3  ">
                    <div class="flex justify-between gap-4  mb-4 ">
                        <div class="px-6 py-6 shadow-md rounded-lg border-collapse  flex-grow text-center">
                            <h1>
                                @if ($count == 0)
                                    no idea
                                @else
                                    {{ Str::plural('idea', $count) }}
                                @endif
                            </h1>
                            <strong class="text-4xl font-medium font-mono ">{{ $count }}</strong>
                        </div>
                        <div class="px-6 py-6 shadow-md rounded-lg border-collapse  flex-grow text-center">
                            <h1>
                                @if ($categories->count() == 0)
                                    category
                                @else
                                    {{ Str::plural('category', $categories->count()) }}
                                @endif
                            </h1>
                            <strong class="text-4xl font-medium font-mono "> {{ $categories->count() }}</strong>
                        </div>
                        <div class="px-6 py-6 shadow-md rounded-lg border-collapse  flex-grow  text-center">
                            <h1>
                                @if ($users == 0)
                                    user
                                @else
                                    {{ Str::plural('user', $users) }}
                                @endif
                            </h1>
                            <strong class="text-4xl font-medium font-mono ">{{ $users }}</strong>
                        </div>
                        <div class="px-6 py-6 shadow-md rounded-lg border-collapse  flex-grow  text-center">
                            <h1>
                                @if ($comments == 0)
                                    comment
                                @else
                                    {{ Str::plural('comment', $comments) }}
                                @endif
                            </h1>
                            <strong class="text-4xl font-medium font-mono ">{{ $comments }}</strong>
                        </div>
                    </div>
                    <div class="bg-buttonSeondColor gap-4 p-3 flex-grow  rounded-md">
                        <div class="flex justify-between">
                            <Strong>show all ideas</Strong>
                            <a href=""> Add category</a>
                          </div>
                          <table class="w-full mt-5">
                            <thead class=" bg-slate-400 ">
                                <th class=" text-start py-2 px-2 w-40">idea</th>
                                <th class=" text-start py-2 px-2 ">content</th>
                                <th class=" text-start py-2 px-2">category</th>
                            </thead>
                            <tbody class="bg-slate-300">
                            @foreach ($votes as $vote)
                            <tr class="border-b-2  ">
                                <td class='py-2 px-2  '>{{$vote->title}}</td>
                                <td class='py-2 px-2 line-clamp-1'>{{$vote->content}}</td>
                                <td class='py-2 px-2'>{{$vote->category->category}}</td>
                              </tr>
                            @endforeach

                            </tbody>
                          </table>
                         <div class="mt-4 flex justify-end">
                            {{$votes->links()}}
                         </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </x-container>
@endsection
