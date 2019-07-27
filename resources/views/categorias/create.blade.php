@extends('layouts.app')
   @section('titulopagina')
    Adicionar categoria
    @endsection
    @section('content')

    @section('conteudopagina')
    @include('layouts._card')              
      <form method="POST" action="{{route('categorias.store')}}">
      @include('categorias._form')              
      </form>


    @endsection

@endsection