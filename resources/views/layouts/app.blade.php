@include('layouts._header')
@include('layouts._navbar')

<main class="py-4">
 <div class="container">
        @yield('content')
            <h4 class="titulopagina">@yield('titulopagina')</h4>
                @include('layouts._error')
                @include('layouts._alert')

                
                @yield('conteudopagina')

    </div>
</main>
@yield('scripts')
@include('layouts._footer')


