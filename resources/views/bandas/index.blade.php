@extends('layouts.app')
@section('content')
   @section('titulopagina')
      Bandas
  @endsection

    @section('conteudopagina')
   
    @include('table.table')

    @endsection

@endsection

