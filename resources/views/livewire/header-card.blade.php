<div>
    <div class="row g-0 align-items-center bg-primary flex-column-reverse flex-lg-row">

        <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
            <h2 class="display-5 text-white mb-5">Discover The Magestic Africa, Let Us Be your Guide</h2>
            <div class="flex space-x-4 justify-center">
                {{-- <livewire:destination-card /> --}}
            </div>
        </div>
        <div class="col-lg-6 wow" data-wow-delay="0.5s">
            <div class="owl-carousel owl-theme owl-loaded header-carousel p-0">

                @unless (count($headers) == 0)

                    @foreach ($headers as $header)
                        <div class="owl-item">
                            
                                <img class="img-fluid" src="{{ asset('storage/' . $header->image) }}"
                                    alt="{{ $header->name }}">

                                <div class="owl-carousel-text">
                                    <h3 class="display-3 text-white shadow-inner shadow-slate-800 mb-0">{{ $header->name }}
                                    </h3>
                                </div>

                        </div>
                    @endforeach
                @else
                    <p class="text-black-text-lg text-center italic">Headers Are Not Available At The Moment.
                    </p>
                @endunless

            </div>

        </div>
    </div>

    @if (auth()->check() && auth()->user()->isMaster())
        <div class="relative p-5 mx-auto" x-data="{ show: false }">
            {{-- @if (count($headers) == 0) --}}
            <x-button x-on:click.prevent="show = true" class="px-4 py-2 text-light rounded bg-primary"><i
                    class="fa fa-add text-primary"></i>
                Add Header</x-button>

            <div class="mx-auto z-9 top-1/3 left-1/3" x-show="show" x-on:click.outside.prevent="show = false">
                @include('livewire.includes.header-show')
            </div>
            {{-- @else --}}
            {{-- <x-button x-on:click.prevent="show = true" class="px-4 py-2 text-light rounded bg-primary"><i
                    class="fa fa-add text-primary"></i>
                Update Header</x-button>

            <div class="mx-auto z-9 top-1/3 left-1/3" x-show="show" x-on:click.outside.prevent="show = false">
                @include('livewire.includes.header-create')
            </div> --}}
            {{-- @endif --}}
        </div>
    @endif

</div>
