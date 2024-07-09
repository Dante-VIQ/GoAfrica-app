<x-card class="p-6 mx-auto mt-24"  style="top: 10%; left: 30%;">

    <header class="text-center text-black">
        <h2 class="text-2xl font-bold uppercase mb-1 ">Post an Article</h2>
        {{-- <p class="mb-4 font-semibold">Post a gig</p> --}}
    </header>

    <div>
        <form wire:submit.prevent="update">
            @csrf
            <div class="flex space-x-2">
            <div class="mb-6 text-black font-semibold">
                <label for="name" class="inline-block text-lg mb-2">Service name</label>
                <input wire:model.live="name" type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ old('name') }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 text-black font-semibold">
                <label for="department" class="inline-block text-lg mb-2">Description</label>
                <input wire:model.live="department" type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="department" value="{{ old('department') }}" />

                @error('department')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="flex space-x-2">
            <div class="mb-6 text-black font-semibold">
                <label for="links" class="inline-block text-lg mb-2">links</label>
                <input wire:model.live="links" type="text" class="border border-gray-200 rounded p-2 w-full" name="links"
                    value="{{ old('links') }}" />

                @error('links')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 text-black font-semibold">
                <label for="image" class="inline-block text-lg mb-2">
                    Image
                </label>
                <input wire:model="image" type="file" class="border border-gray-200 rounded p-2 w-full" />

                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                @if ($image)

                <img class="img-fluid w-24 h-24" src="{{ $image->temporaryUrl() }}" alt="">
                @endif
                <div wire:loading wire:target="image">
                    <span class="text-green-500 text-center">Uploading...</span>
                </div>
            </div>
        </div>

            <div class="mb-6 text-black font-semibold">
                <button class="bg-laravel rounded py-2 px-4">
                    Update
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-card>
