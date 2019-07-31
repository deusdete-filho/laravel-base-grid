{{ csrf_field() }}
<div class="form-group">
          <label for="name">Nome</label>
          <input class="form-control" id="name" name="name" value="{{old('name',$categoria->name)}}" required>
        </div>        
        <div class="form-group">
          <label for="name">Imagem</label>
         <p> <img src="{{ url("img/$categoria->foto") }}" alt="..." class="img-thumbnail" style="height: 200px;"></p>
          <input class="form-control" name="foto" type ="file"  value="{{old('foto',$categoria->foto)}}">
        </div>
        </div>
    @include('layouts._form_footer')
                <button type="submit" class="btn btn-dark">Salvar</button>
         </div>
    



