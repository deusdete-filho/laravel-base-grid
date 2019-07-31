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
                ],
                [
                    'label' => 'Data criação',
                    'name' => 'created_at',
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
            // ->addShowAction('categorias.show')

            ->paginate(15)
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
            $nameFile = null;
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                $name = uniqid(date('HisYmd'));
                $extension = $request->foto->extension();
                $nameFile = "{$name}.{$extension}";
                $request->foto->storeAs('img', $nameFile);
                $data['foto'] = $nameFile;

                Categorias::create($data);
                session()->flash('message', 'Cadastrado com sucesso!');
                return redirect()->route('categorias.index');
            }
    }

    public function edit(Categorias $categoria)
    {
        return view('categorias.edit', compact('categoria'));

    }
    public function show(Categorias $categoria)
    {
        return redirect()->route('categorias.show', compact('categoria'));
    }
    public function update(Request $request, Categorias $categoria)
    {   
        $data = $this->_validate($request);
        $data = $request->all();

        $nameFile = null;
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->foto->extension();
            $nameFile = "{$name}.{$extension}";        
            $request->foto->storeAs('img', $nameFile);
            $data['foto'] = $nameFile;

            $categoria -> fill($data);
            $categoria ->save();
            session()->flash('message', 'Alterado com sucesso!');
            return redirect()->route('categorias.index');
        }
    }
    public function destroy($id)
    {
        $destroy = Categorias::findOrFail($id);
        $destroy->delete();
        session()->flash('message', 'Deletado com sucesso!');
        return redirect()->route('categorias.index');
    }
    protected function _validate(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|max:255',
            'foto'=>'required|mimes:jpeg,bmp,png'

        ]);

    }
}
