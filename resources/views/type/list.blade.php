@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tipos</li>
                    <li class="breadcrumb-item"><a href="/types/new">Novo</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white d-flex justify-content-between">
                   <h1 class="fw-bold">Tipos</h1>
                </div>
                <div class="card-body p-4">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor de referência</th>
                        <th scope="col">Unidade padrão</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($types as $type)
                            <tr>
                            <th scope="row">{{$type->id}}</th>
                            <td>{{$type->name}}</td>
                            <td>{{$type->reference_value}}</td>
                            <td>{{$type->unit}}</td>
                            <td>
                                <div class="d-flex gap-1">
                                <a href="/types/{{$type->id}}" class="btn btn-secondary">Editar</a>
                                <form action="/types/{{$type->id}}" method="POST">
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
                                    Nenhum tipo cadastrado
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