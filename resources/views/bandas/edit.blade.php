@extends('layouts.app')
@section('content')
   @section('titulopagina')
    Editar banda
    @endsection
    @section('conteudopagina')
    <form action="/bandas/{{ $dado->id }}" method="post">
        {{ csrf_field() }}
          <div class="form-row">
              <div class="form-group col-md-3">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" id="name" 
                aria-describedby="name" placeholder="Digite"
                required 
                value="{{ $dado->name }}">
              </div>
              </div>
              <div class="form-group col-md-3">
                  <label>Imagem</label>
                  <input type="text" name="imagem" class="form-control" 
                  id="name" aria-describedby="name" placeholder="Digite" required
                  value="{{ $dado->imagem }}">
            </div>
              <div class="form-group col-md-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
              </div> 
          </div>               
      </form>
    @endsection
@endsection