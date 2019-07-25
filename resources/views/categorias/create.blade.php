@extends('layouts.app')
@section('content')
   @section('titulopagina')
    Adicionar categoria
    @endsection

    @section('conteudopagina')
      <form method="POST" action="store">
                    @csrf
            <div class="form-row">
            <div class="form-group col-md-3">
                  <label>Nome</label>
                  <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Digite" required>
            </div>
            <div class="form-group col-md-10">
                  <button type="submit" class="btn btn-primary">Adicionar</button>
            </div> 
            </div>               
      </form>
    @endsection

@endsection