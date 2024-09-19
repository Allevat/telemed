<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Type;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Seleciona todos os "exames" e armazena no array
        $exams = Exam::with('type')->get();
        return view('exams/list',['exams' => $exams ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //Buscar os tipos no BD
        $types = Type::all();

        //Retornar o form com os dados
        return view('exams/form',["types" => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exam = new Exam();
        $exam->type_id = $request->type_id;
        $exam->date = $request->date;
        $exam->value = $request->value;

        $exam->save();

        //Buscar os tipos no BD
        $types = Type::all();

        //return redirect('/types/new');
        return view('exams/form',["success"=>true, "types"=> $types ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Buscar os tipos no BD
        $types = Type::all();

        //Retornar o exame do banco de dados
        $exam = Exam::findOrFail($id);

        //Retorna a view form com os dados do
        //tipo encontrado no BD
        return view('exams/form',["types"=>$types, "exam"=>$exam]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //Verificar se o tipo existe
        $exam = Exam::findOrFail($request->id);

        //Alterar os dados
        $exam->type_id = $request->type_id;
        $exam->date = $request->date;
        $exam->value = $request->value;

        //Editar
        $exam->save();

        //Redirecionar para a página dos tipos
        return redirect('/exams');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         //Retornar o exame do banco de dados
         $exam = Exam::findOrFail($id);

         //excluir o exame do banco de dados
         $exam->delete();
 
         //Redirecionar para a página meus exames
         return redirect('/exams');
    }
}
