@include('layouts._header')
@include('layouts._navbar')

<main class="py-4">
 <div class="container">
     <div class="content-center">
        @yield('content')
            <h4 class="titulopagina">@yield('titulopagina')</h4>
                @include('layouts._error')
                
                @yield('conteudopagina')

    </div>
</main>
@include('layouts._footer')


