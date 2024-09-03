<div class="navbar navbar-expand-lg  navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">

    {{-- <x-button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </x-button> --}}

    {{-- <div class="collapse navbar-collapse" id="navbarCollapse"> --}}
    <div class="navbar-nav ms-auto p-4 p-lg-0 text-black lg:flex sm:text-xsm">
        <a wire:navigate href="/dashboard" class="nav-item nav-link active">Home</a>
        <a wire:navigate href="/destination" class="nav-item nav-link">Destinations</a>
        <a wire:navigate href="/main" class="nav-item nav-link">History</a>
        <a wire:navigate href="/main" class="nav-item nav-link">Blogs</a>

        <div class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                <a wire:navigate href="/events" class="dropdown-item">Art</a>
                {{-- <a wire:navigate href="/cuisines" class="dropdown-item">History and Cuisine</a> --}}
                <a wire:navigate href="/appointment" class="dropdown-item">Appointment</a>
                <a wire:navigate href="/test-me" class="dropdown-item">Testimonial</a>
                <a wire:navigate href="/contact" class="dropdown-item">Contact</a>
                <a wire:navigate href="/about" class="dropdown-item">About</a>
                {{-- <a href="404.html" class="dropdown-item">404 Page</a> --}}
            </div>
        </div>
        {{-- <a wire:navigate href="/contact" class="nav-item nav-link">Contact</a> --}}

        <span class="mx-auto text-center py-4 px-5"><a href="/chatify">
            <h3 class="text-lg text-slate-950"><i wire:navigate class=""><i class="fa fab-chat"></i></i></h3>
        </a></span>
        {{--
            <a wire:navigate  href="/appointment" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Book Now<i class="fa fa-arrow-right ms-3"></i></a> --}}
    </div>
    {{-- </div> --}}




</div>
