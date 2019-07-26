@if(count($table->rows()))
<div class="row">
        <div class="col-sm-2">
        <a href="{{url()->current()}}/create" class="btn  btn-dark">Adicionar</a>
        </div>
            <div class="col-sm-7"></div>

        <div class="col-sm-3">
        <form action="{{url()->current()}}" method="GET" class="form-inline">
            <div class="input-group mb-3 ml-auto">
                <input type="text" name="search" class="form-control" placeholder="Digite" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                <button class="btn btn-outline-dark" type="submit" id="button-addon2">Pesquisar</button>
                </div>
                </div>
        </form>
        </div>


    <table class="table table" id="table-search">
        <thead class="thead">
        <tr>
            @foreach($table->columns() as $column)
                <th data-name="{{$column['name']}}">
                    {{$column['label']}}
                    @if(isset($column['_order']))
                        @php
                            $icons = [
                                1 => 'glyphicon-sort',
                                 'asc' => 'glyphicon-sort-by-alphabet',
                                 'desc' => 'glyphicon-sort-by-alphabet-alt',
                            ];
                        @endphp
                        <a href="javascript:void(0)">
                            <span class="glyphicon {{$icons[$column['_order']]}}"></span>
                        </a>
                    @endif
                </th>
            @endforeach
            @if(count($table->actions()))
                <th>Ações</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($table->rows() as $row)
            <tr>
                @foreach($table->columns() as $column)
                    <td>{{ $row->{$column['name']} }}</td>
                @endforeach
                @if(count($table->actions()))
                    <td>
                        @foreach($table->actions() as $action)
                            @include($action['template'],[
                                'row' => $row,
                                'action' => $action,
                            ])
                        @endforeach
                    </td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<br>
<div class=" pagination justify-content-center">  
    {!! $table->rows()->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
</div>
@else
<div class="row">
        <div class="col-sm-2">
        <a href="{{url()->current()}}/create" class="btn btn-sm btn-outline-dark">+ Adicionar</a>
        </div>
            <div class="col-sm-7"></div>

        <div class="col-sm-3">
        <form action="{{url()->current()}}" method="GET" class="form-inline">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control btn-sm" placeholder="Digite" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                <button class="btn btn-outline-secondary btn-sm" type="submit" id="button-addon2">Pesquisar</button>
                </div>
                </div>
        </form>
        </div>
        </div>
<div class="text-center">
<br>  
<h6>Nenhum registro encontrado</h6>
<br>
</div>
@endif

@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-search>thead>tr>th[data-name]>a')
            .click(function(){
                var anchor = $(this);
                var field = anchor.closest('th').attr('data-name');
                var order =
                    anchor.find('span').hasClass('glyphicon-sort-by-alphabet-alt') || anchor.find('span').hasClass('glyphicon-sort')
                    ? 'asc':'desc';
                var url = "{{url()->current()}}?";
                @if(\Request::get('page'))
                    url += "page={{\Request::get('page')}}&";
                @endif
                @if(\Request::get('search'))
                    url += "search={{\Request::get('search')}}&";
                @endif
                url+='field_order='+field+'&order='+order;
                window.location = url;
            })
    });
</script>
@endpush