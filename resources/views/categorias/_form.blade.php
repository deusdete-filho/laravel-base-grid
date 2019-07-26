{{ csrf_field() }}
        <div class="form-group">
          <label for="name">Nome</label>
          <input class="form-control" id="name" name="name" value="{{old('name',$categoria->name)}}" required>
        </div>
        <button type="submit" class="btn btn-dark">Salvar</button>
