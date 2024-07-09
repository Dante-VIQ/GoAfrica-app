<x-card class="p-10 max-w-lg"  style="top: 10%; left: 30%;">

    <header class="text-center text-black">
        <h2 class="text-2xl font-bold uppercase mb-1 ">Post an Article</h2>
        {{-- <p class="mb-4 font-semibold">Post a gig</p> --}}
    </header>

    <div>
        <form wire:submit.prevent="create">
            @csrf
            
            <div class="mb-6 text-black font-semibold">
                <label for="title" class="inline-block text-lg mb-2">Service Title</label>
                <input wire:model.live="title" type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ old('title') }}" />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 text-black font-semibold">
                <label for="category" class="inline-block text-lg mb-2">Description</label>
                <input wire:model.live="category" type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="category" value="{{ old('category') }}" />

                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 text-black font-semibold">
                <x-button class="bg-laravel rounded py-2 px-4">
                    Create
                </x-button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-card>