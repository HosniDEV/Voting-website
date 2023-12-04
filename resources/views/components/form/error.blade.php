@props(['name'])

@error($name)
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
            @enderror




            {{-- // another methoed to create error but it will show all error form  --}}


            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
