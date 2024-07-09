<x-card class="p-10 max-w-lg" style="top: 10%; left: 30%;">
    <header class="text-center text-black">
        <h2 class="text-2xl font-bold uppercase mb-1 ">Post an Article</h2>
        {{-- <p class="mb-4 font-semibold">Post a gig</p> --}}
    </header>


        <form wire:submit.prevent="update({{ $about->id }})">
            @csrf
            <div class="flex space-x-2">
                <div class="mb-6 text-black font-semibold">
                    <label for="editingNewTitle" class="inline-block text-lg mb-2">title</label>
                    <input wire:model.live="editingNewTitle" type="text"
                        class="border border-gray-200 rounded p-2 w-full" name="editingNewTitle"
                        value="{{ old('editingNewTitle') }}" />

                    @error('editingNewTitle')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 text-black font-semibold">
                    <label for="editingNewDetail" class="inline-block text-lg mb-2">Detail</label>
                    <input wire:model.live="editingNewDetail" type="text"
                        class="border border-gray-200 rounded p-2 w-full" name="editingNewDetail"
                        value="{{ old('editingNewDetail') }}" />

                    @error('editingNewDetail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex space-x-2">
                <div class="mb-6 text-black font-semibold">
                    <label for="editingNewMerit" class="inline-block text-lg mb-2">merit</label>
                    <input wire:model.live="editingNewMerit" type="text"
                        class="border border-gray-200 rounded p-2 w-full" name="editingNewMerit"
                        value="{{ old('editingNewMerit') }}" />

                    @error('editingNewMerit')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 text-black font-semibold">
                    <label for="images" class="inline-block text-lg mb-2">
                        Image
                    </label>
                    <input wire:model="editingNewImage" accept="image/png, image/jpeg, image/jfif, image/jpg"
                        type="file" class="border border-gray-200 rounded p-2 w-full" />

                    @error('editingNewImage')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    @if ($image)
                        {{-- @foreach ($images as $image) --}}
                        <img class="img-fluid w-24 h-24" src="{{ $editingNewImage->temporaryUrl() }}" alt="">
                        {{-- @endforeach --}}
                    @endif
                    <div wire:loading wire:target="editingNewImage">
                        <span class="text-green-500 text-center">Uploading...</span>
                    </div>
                </div>
            </div>

            <div class="mb-6 text-black font-semibold">
                <label for="photo" class="inline-block text-lg mb-2">
                    photo
                </label>
                <input wire:model="editingNewPhoto" accept="image/png, image/jpeg, image/jfif, image/jpg" type="file"
                    class="border border-gray-200 rounded p-2 w-full" />

                @error('editingNewPhoto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                @if ($photo)
                    {{-- @foreach ($images as $image) --}}
                    <img class="img-fluid w-24 h-24" src="{{ $editingNewPhoto->temporaryUrl() }}" alt="">
                    {{-- @endforeach --}}
                @endif
                <div wire:loading wire:target="photo">
                    <span class="text-green-500 text-center">Uploading...</span>
                </div>
            </div>
            <div class="mb-6 text-black font-semibold">

                <x-button
                    class="bg-laravel rounded py-2 px-4">
                    Update
                </x-button>

            </div>
        </form>

</x-card>
