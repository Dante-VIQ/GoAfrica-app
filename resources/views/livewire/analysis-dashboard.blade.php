<div class="mt-20">
    <div class="grid grid-cols-4 h-32">
        <div>
            {{-- @unless (count($users) == 0) --}}


                {{-- @foreach ($this->users as $user) --}}
                    <p class="bg-white text-2xl text-black text-center p-5 pb-0">
                        {{ $this->userCount }}
                    </p>
                {{-- @endforeach --}}

            {{-- @endunless --}}
        </div>

        <div>

            <p class="text-2xl text-black text-center p-5">
                {{ $this->destinationCount }}
            </p>
        </div>
        <div>

            <p class="text-2xl text-black text-center ">
                {{ $this->blogCount }}
            </p>
        </div>

        <div>

            <p class="text-2xl text-black text-center">
                {{ $this->cityCount }}
            </p>
        </div>
    </div>
</div>
