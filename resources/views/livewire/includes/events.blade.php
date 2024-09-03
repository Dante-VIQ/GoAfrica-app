
        <div>
            <div class="flex">
                <a href="#" class="text-lg text-green-800 p-3 font-semibold">{{ $feature->title }}</a>
                {{-- <p class="p-4 italic">by Royal Media.</p> --}}
            </div>
            <img src="{{ asset('storage/' . $feature->image) }}" class="w-full h-72 rounded-xl" alt="">
            <!-- <h5 class="text-xl leading-tight text-gray-950 p-2">Milking millions from farming</h5> -->
            <div class="text-2xl text-gray-200 space-x-2 bg-transparent max-w-full justify-around p-2 rounded-b-2xl flex -mt-10">
                <button type="button">
                    <i class="fa fa-hand-holding-heart hover:text-blue-600"></i>
                </button>
                <button type="button">
                    <i class="fa fa-arrow-alt-circle-right  hover:text-blue-600"></i>
                </button>
                <button type="button">
                    <i class="fa fa-share-alt  hover:text-blue-600"></i>
                </button>
            </div>
        </div>

