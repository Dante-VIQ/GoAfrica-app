<div>

    <div class="row g-0 mx-lg-0 bg-primary">
        @unless (count($features) == 0)

            @foreach ($features as $feature)
                @include('livewire.includes.feature-body')
            @endforeach
        @else
            <p class="text-black-text-lg text-center italic">Features Are Not Available At The Moment.</p>
        @endunless
    </div>


        <div class="relative p-5 mx-auto" x-data="{ show: false }">
            <x-button x-on:click.prevent="show = true" class=" justify-center px-4 py-2 text-light rounded bg-primary"><i
                    class="fa fa-add text-primary"></i>
                Create Feature</x-button>

            <div x-show="show" x-on:click.outside.prevent="show = false">
                @include('livewire.includes.feature-create')
            </div>
        </div>


</div>
