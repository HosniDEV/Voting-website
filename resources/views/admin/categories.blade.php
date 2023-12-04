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
                    <div class="bg-buttonSeondColor gap-4 p-3   rounded-md flex justify-between ">
                        <div class="">
                            <form action="{{ route('admin.store') }}" method="post"
                                class=" space-y-2  border rounded-lg  border-buttonColor px-4 py-3">
                                @csrf
                                <x-form.input name='category'>
                                </x-form.input>
                                <x-form.button name='add category' class="">
                                </x-form.button>
                            </form>
                            <table class=" mt-5 w-full rounded-lg">
                                <thead class=" bg-slate-400  rounded-lg ">
                                    <th class=" py-2 px-2 w-40 text-center">category</th>
                                    <th class="  py-2 px-2  text-center">delete</th>

                                </thead>
                                <tbody class="bg-slate-300  rounded-lg">
                                    @foreach ($categories as $category)
                                        <tr class="border-b-2  ">
                                            <td class='py-2 px-2 text-center '>{{ $category->category }}</td>
                                            <form action="{{ route('admin.destroy', $category->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <td class='py-2 px-2 text-center '><button><i
                                                            class="fa-solid fa-trash text-redColor"></i></button></td>
                                            </form>
                                            {{-- <td class='py-2 px-2  '><i class="fa-solid fa-pencil text-greenColor"></i></td> --}}

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="w-1/2 relative ">
                            <img src="https://c4.wallpaperflare.com/wallpaper/247/542/403/jellyfish-abstract-invertebrate-animal-wallpaper-preview.jpg"
                                alt="" class="h-full object-cover object-centers flex-shrink-0 rounded-lg">
                            <h1 class="absolute inset-0   z-30  flex justify-center items-center">
                                <div class="text-white text-center align-middle  font-bold text-4xl rotate-45 uppercase">
                                    The best is here
                                </div>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </x-container>
@endsection
