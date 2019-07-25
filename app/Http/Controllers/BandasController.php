<?php

namespace App\Http\Controllers;

use App\Bandas;
use App\Table\Table;

use Illuminate\Http\Request;

class BandasController extends Controller
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
        $count = Bandas::count();

        $this->table
            ->model(Bandas::class)
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
            ->addEditAction('bandas.edit')
            ->addDeleteAction('bandas.destroy')
            ->paginate(10)
            ->search();
        return view('bandas.index',[
            'table' => $this->table
        ]);
    }

    public function create()
    {
        return view('bandas/create');
    }

    public function store(Request $request)
    {
        Bandas::create($request->all());
        return redirect('/bandas');
    }

    public function edit($id)
    {
        $edit = Bandas::findOrFail($id);
        return view('bandas.edit', ['dado' => $edit]);

    }

    public function update(Request $request, $id)
    {
        $update = Bandas::findOrFail($id);
        $update->update($request->all());
        return redirect('/bandas');
    }

    public function destroy($id)
    {
        $destroy = Bandas::findOrFail($id);
        $destroy->delete();
        return redirect('/bandas');
    }
}
