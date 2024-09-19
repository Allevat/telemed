<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Type;

class TypeController extends Controller
{

    public function index(){
        //Seleciona todos os "tipos" e armazena no array
        $types = Type::all();

        return view('type/list',['types' => $types ]);
    }//fim do index

    public function store(Request $request){

        $type = new Type();
        $type->name = $request->name;
        $type->unit = $request->unit;
        $type->reference_value = $request->reference_value;
        $type->description = $request->description;

        $type->save();

        //return redirect('/types/new');
        return view('type/form',["success"=>true]);

    }//fim da store

    public function destroy($id){
        //Retornar o tipo do banco de dados
        $type = Type::findOrFail($id);

        //excluir o tipo do banco de dados
        $type->delete();

        //Redirecionar para a página dos tipos
        return redirect('/types');
    }//fim do destroy

    public function edit($id){
        //Retornar o tipo do banco de dados
        $type = Type::findOrFail($id);

        //Retorna a view form com os dados do
        //tipo encontrado no BD
        return view('type/form',["type"=>$type]);

    }//fim do show

    public function update(Request $request){
        //Verificar se o tipo existe
        $type = Type::findOrFail($request->id);

        //Alterar os dados
        $type->name = $request->name;
        $type->unit = $request->unit;
        $type->reference_value = $request->reference_value;
        $type->description = $request->description;

        //Editar
        $type->save();

        //Redirecionar para a página dos tipos
        return redirect('/types');
    }

}//fim da classe
