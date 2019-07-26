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
        return view('categorias/create',['dado' => new Categorias()]);
    }

    public function store(Request $request)
    {
        $data = $this->_validate($request);
        $data = $request->all();
        Categorias::create($data);
        return redirect()->route('categorias.index');
    }

    public function edit($id)
    {
        $edit = Categorias::findOrFail($id);
        return view('categorias.edit', ['dado' => $edit]);

    }
    public function show(Categorias $categorias)
    {
        return view('/categorias');
    }
    public function update(Request $request, $id)
    {   
        $update = Categorias::findOrFail($id);
        $this->_validate($request);
        $data = $request->all();
        $update -> fill($data);
        $update ->save();
        return redirect()->route('categorias.index');

    }

    public function destroy($id)
    {
        $destroy = Categorias::findOrFail($id);
        $destroy->delete();
        return redirect('/categorias');
    }
    protected function _validate(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|max:255'

        ]);

    }
}
