<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="grid gap-5 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @unless (count($doctors) == 0)
                    @foreach ($doctors as $doctor)
                        @include('livewire.includes.doctor-show')
                    @endforeach
                @else
                    <p class="text-black-italic text-lg">No Doctors At The Moment</p>
                @endunless

            </div>
        </div>
    </section>


    {{-- @if ($edittingDoctorID === $doctor->id)
        @include('livewire.includes.doctor-edit')
    @else
         @include('livewire.includes.doctor-show')
    @endif --}}

    @if (auth()->check() && auth()->user()->isAdmin())
        <div class="relative p-5 mx-auto" x-data="{ show: false }">
            <x-button x-on:click.prevent="show = true" class="px-4 py-2 text-light rounded bg-primary"><i
                    class="fa fa-add text-primary"></i>
                Add Doctor</x-button>

            <div class="mx-auto z-9 top-1/3 left-1/3" x-show="show" x-on:click.outside.prevent="show = false">
                @include('livewire.includes.doctor-create')
            </div>
        </div>
    @endif
    {{-- <div class="mt-6 p-4">
        {{ $doctors->links() }}
    </div> --}}
</div>
