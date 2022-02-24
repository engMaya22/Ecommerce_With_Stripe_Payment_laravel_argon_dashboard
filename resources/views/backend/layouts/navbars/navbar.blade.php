@auth()
    @include('backend.layouts.navbars.navs.auth')
@endauth

@guest()
    @include('backend.layouts.navbars.navs.guest')
@endguest
