<a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-3">
    @if (auth()->check() && auth()->user()->isAdmin())
        <h1 class="m-0 text-primary text-3xl font-semibold"><i class="far fa-hospital me-3"></i>GoAfrica Expert</h1>
    @else
        <h1 class="m-0 text-primary text-3xl font-semibold"><i class="far fa-hospital me-3"></i>GoAfrica</h1>
    @endif
</a>
