@extends('layouts.app')
@section('content')
   @section('titulopagina')
    Editar categoria
    @endsection
    @section('conteudopagina')
    <form action="/categorias/{{ $dado->id }}" method="post">
        {{ csrf_field() }}
          <div class="form-row">
              <div class="form-group col-md-3">
                <label>Nome da categoria</label>
                <input type="text" name="name" class="form-control" id="name" 
                aria-describedby="name" placeholder="Digite"
                required 
                value="{{ $dado->name }}">
              </div>
              <div class="form-group col-md-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
              </div> 
          </div>               
      </form>
    @endsection
@endsection