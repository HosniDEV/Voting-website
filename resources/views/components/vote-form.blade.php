@props(['categories'])
<div
    class="h-[450px]   col-span-1  sticky top-20  z-10 px-3 pt-8  bg-cardColor shadow-md rounded-md border border-collapse  space-y-10">
    <div class="space-y-4  text-center">
        <h1 class="block text-lg font-sans font-medium">Add an idea</h1>
        <p class="text-sm font-base font-sans ">Let us know what you would like and
            <br>
            we'll take a look over!
        </p>
    </div>
    <form class="space-y-3" method="post" action="{{ route('vote.store') }}" enctype="multipart/form-data">
        @csrf
        <input name='title' type="text" placeholder="Your idea"
            class="w-full bg-inputColor py-2 rounded-lg px-3 placeholder:text-black placeholder:text-sm focus:outline-buttonColor focus:outline">
        @error('title')
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
        @enderror
        <select name="category_id" id=""
            class="w-full bg-inputColor py-2 rounded-lg px-3 placeholder:text-black placeholder:text-sm focus:outline-buttonColor focus:outline">
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="text-sm bg-inputColor py-2 px-3 rounded-lg">
                        {{ $category->category }}</option>
                @endforeach
            @else
                <option value="" class="text-sm bg-inputColor py-2 px-3 rounded-lg">no category</option>
            @endif

        </select>
        <textarea name="content" id="" cols="2" rows="3"
            class="w-full bg-inputColor py-2 rounded-lg px-3 placeholder:text-black placeholder:text-sm focus:outline-buttonColor focus:outline"
            placeholder="describe your idea"></textarea>
        @error('content')
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
        @enderror
        <div class="flex  justify-between items-center">
            <input name='image' type="file" id="file" class="hidden">
            <label for="file" class="bg-buttonSeondColor py-2 px-7 rounded-md  font-medium font-sans text-base"><i
                    class="fa-solid fa-paperclip text-black text-sm inline"></i> Attach</label>
            <button
                class=" bg-buttonColor py-2 px-9 rounded-md  text-white font-medium font-sans text-base">Submit</button>
        </div>
    </form>
</div>
