@extends('layouts.app')
@section('content')
   @section('titulopagina')
      Usuários
  @endsection

    @section('conteudopagina')
   
    @include('table.table')

    @endsection

@endsection

