@extends('layouts.app')
@section('content')
   @section('titulopagina')
    Editar categoria
    @endsection
    @section('conteudopagina')
    @include('layouts._card')

    <form action="{{ route('categorias.update',['categoria' => $categoria->id]) }}" method="post" enctype="multipart/form-data">

        {{method_field('PUT')}}
        @include('categorias._form')
      </form>
    @endsection
@endsection