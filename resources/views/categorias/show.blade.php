@extends('layouts.app')
@section('content')
   @section('titulopagina')
   {{categoria->name}}
    @endsection
    @section('conteudopagina')

    {{categoria->name}}

    @endsection
@endsection