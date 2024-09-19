@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Meus exames</li>
                    <li class="breadcrumb-item"><a href="/exams/new">Novo exame</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white d-flex justify-content-between">
                   <h1 class="fw-bold">Meus Exames</h1>
                </div>
                <div class="card-body p-4">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($exams as $exam)
                            <tr>
                            <th scope="row">{{$exam->id}}</th>
                            <td>{{$exam->type->name}}</td>
                            <td>{{date('d/m/Y', strtotime($exam->date))}}</td>
                            <td>{{$exam->value}} {{$exam->type->unit}}</td>
                            <td>
                                <div class="d-flex gap-1">
                                <a href="/exams/{{$exam->id}}" class="btn btn-secondary">Editar</a>
                                <form action="/exams/{{$exam->id}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger">
                                        Excluir
                                    </button>
                                </form>
                                </div>
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center fs-4">
                                    Nenhum Exame cadastrado
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div><!-- fim da col -->
    </div><!-- fim da row -->
</div> <!-- fim do container -->
@endsection