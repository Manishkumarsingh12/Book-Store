@include('layout.header')
<title>@yield('Title')</title>
@include('layout.navbar')
<main>
    <div class="container">
        <div class="row">
            <div>
                <h3 class="text-center text-danger py-2">@yield('Heading')</h3>

                @yield('Content')

            </div>
        </div>
    </div>
</main>
@include('layout.footer')
