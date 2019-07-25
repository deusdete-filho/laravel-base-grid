<?php

namespace App\Http\Controllers;

use App\Users;
use App\Table\Table;

class UsuariosController extends Controller
{
    /**
     * @var Table
     */
    private $table;


    /**
     * UsuariosController constructor.
     */
    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    public function index()
    {
        $this->table
            ->model(Users::class)
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
                    'label' => 'Email',
                    'name' => 'email',
                    'order' => true
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
            ->addEditAction('usuarios.edit')
            ->addDeleteAction('usuarios.destroy')
            ->paginate(5)
            ->search();
        return view('usuarios.index',[
            'table' => $this->table
        ]);
    }

    public function edit($id)
    {
        $edit = Users::findOrFail($id);
        return view('usuarios.edit', ['dado' => $edit]);

    }

    public function update(Request $request, $id)
    {
        $update = Users::findOrFail($id);
        $update->update($request->all());
        return redirect('/usuarios');
    }

    public function destroy($id)
    {
        $destroy = Users::findOrFail($id);
        $destroy->delete();
        return redirect('/usuarios');
    }
}
