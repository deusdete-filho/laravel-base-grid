@extends('layouts.app')
@section('content')
   @section('titulopagina')
      Categorias
  @endsection

    @section('conteudopagina')
    @include('layouts._card')
   
    @include('table.table')

    @endsection

@endsection

