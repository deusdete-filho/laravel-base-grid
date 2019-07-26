@extends('layouts.app')
@section('content')
   @section('titulopagina')
    Editar categoria
    @endsection
    @section('conteudopagina')
    <form action="{{ route('categorias.update',['categoria' => $categoria->id]) }}" method="post">

        {{method_field('PUT')}}
        @include('categorias._form')
      </form>
    @endsection
@endsection