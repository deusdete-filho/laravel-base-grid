@extends('layouts.app')
@section('content')
   @section('titulopagina')
      Categorias
  @endsection

    @section('conteudopagina')
   
    @include('table.table')

    @endsection

@endsection

