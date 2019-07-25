@extends('layouts.app')
@section('content')
   @section('titulopagina')
   Dashboard
    @endsection

    @section('conteudopagina')

    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bem vindo, {{ Auth::user()->name }}

    @endsection

@endsection