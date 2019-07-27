@include('layouts._header')
@include('layouts._navbar')

<main class="py-4">
 <div class="container">
     <div class="content-center">
        @yield('content')    
        <div class="col-sm-12">
            <h4 class="titulopagina">@yield('titulopagina')</h4>

            <div class="card" id="style-card">
                <div class="card-body">

                @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                            @endforeach
                        </div>
                @endif

                    @yield('conteudopagina')

            </div>
        </div>
</main>
@include('layouts._footer')


