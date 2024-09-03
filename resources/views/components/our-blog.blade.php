<div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{-- {{ __('Dashboard') }} --}}
    </x-nav-link>
    <div class="pl-5  text-black">
        <ul class="text-lg flex space-x-3  font-sans">
            <span><a href="#" class="hover:text-red-700"><i class="fa fa-newspaper pl-5"></i>
                    <h5>Home</h5>
                </a></span>
            <span><a href="#" class="hover:text-red-700"><i class="fa fa-person-digging pl-4"></i>
                    <h5>BizArt</h5>
                </a></span>
            <span><a href="#" class="hover:text-red-700"><i class="fa fa-mountain-city pl-6"></i>
                    <h5>JuAfrica</h5>
                </a></span>
           <span><a href="#" class="hover:text-red-700"><i class="fa fa-users-between-lines pl-12"></i>
                    <h5>Entertainment</h5>
                </a></span>
            <span><a href="#" class="hover:text-red-700"><i class="fa fa-person pl-5"></i>
                    <h5>Health</h5>
                </a></span>
            <span><a href="#" class="hover:text-red-700"><i class="fa fa-video pl-3"></i>
                    <h5>Video</h5>
                </a></span>
        </ul>
    </div>
</div>
</div>
