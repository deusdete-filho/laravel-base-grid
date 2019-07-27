@extends('layouts.app')
@section('content')
   @section('titulopagina')
    Adicionar categoria
    @endsection

    @section('conteudopagina')
    
      <form method="POST" action="{{route('categorias.store')}}">
      @include('categorias._form')              
      </form>


    @endsection

@endsection