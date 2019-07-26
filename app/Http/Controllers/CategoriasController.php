<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Table\Table;

use Illuminate\Http\Request;
class CategoriasController extends Controller
{
    /**
     * @var Table
     */
    private $table;

    public function __construct(Table $table)
    {
        $this->table = $table;
    }
    public function index()    
    {
        $this->table
            ->model(Categorias::class)
            ->columns([
                [
                    'label' => 'ID',
                    'name' => 'id',
                    'order' => true //true, asc ou desc
                ],
                                [
                    'label' => 'Nome',
                    'name' => 'name',
                    'order' => true //true, asc ou desc
                ]
            ])
            ->filters([
                [
                    'name' => 'id',
                    'operator' => '='
                ],
                [
                    'name' => 'name',
                    'operator' => 'LIKE'
                ]
            ])
            ->addEditAction('categorias.edit')
            ->addDeleteAction('categorias.destroy')
            ->paginate(10)
            ->search();
        return view('categorias.index',[
            'table' => $this->table
        ]);
    }

    public function create()
    {
        return view('categorias/create',['categoria' => new Categorias()]);
    }

    public function store(Request $request)
    {
        $data = $this->_validate($request);
        $data = $request->all();
        Categorias::create($data);
        return redirect()->route('categorias.index');
    }

    public function edit(Categorias $categoria)
    {
        return view('categorias.edit', compact('categoria'));

    }
    public function show(Categorias $categoria)
    {
        return redirect()->route('categorias.index');
    }
    public function update(Request $request, Categorias $categoria)
    {   
        $this->_validate($request);
        $data = $request->all();
        $categoria -> fill($data);
        $categoria ->save();
        return redirect()->route('categorias.index');

    }

    public function destroy($id)
    {
        $destroy = Categorias::findOrFail($id);
        $destroy->delete();
        return redirect()->route('categorias.index');
    }
    protected function _validate(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|max:255'

        ]);

    }
}
