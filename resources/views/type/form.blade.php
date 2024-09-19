@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
        <div class="col-lg-8 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/types">Tipos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
            </nav>
        </div>
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h1 class="fw-bold">
                        {{ isset($type->id) ? "Alterar Tipo" : "Novo Tipo" }}
                    </h1>
                </div>
                <div class="card-body p-4">
                    @if(isset($type->id))
                        <form action="/types/{{$type->id}}" method="POST">
                        @method('put')
                    @else 
                        <form action="/types/new" method="POST">
                    @endif
                        @csrf
                        <!-- Nome -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" 
                                   id="name" name="name" placeholder="Nome"
                                   value="{{ $type->name ?? null }}">
                            <label for="name">Nome</label>
                        </div>

                        <!-- Unidade "unit" -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" 
                                   id="unit" name="unit" placeholder="Unidade"
                                   value="{{ $type->unit ?? null }}">
                            <label for="unit">Unidade</label>
                        </div>

                        <!-- Valor de referência "reference_value" -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" 
                                   id="reference_value" name="reference_value" 
                                   placeholder="Valor de referência"
                                   value="{{ $type->reference_value ?? null }}">
                            <label for="reference_value">Valor de referência</label>
                        </div>

                        <!-- Descrição "description" -->
                        <div class="form-floating mb-3">
                            <textarea
                                   class="form-control" 
                                   id="description" name="description" 
                                   placeholder="Descrição">{{ $type->description ?? null }}</textarea>

                            <label for="description">Descrição</label>
                        </div>
                        <div class="d-flex justify-content-end gap-1">
                            <button class="btn btn-secondary" type="reset">Limpar</button>
                            <button class="btn btn-success" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- fim da col -->
    </div><!-- fim da row -->
</div> <!-- fim do container -->

@isset($success)
<style>
    .toast{
        position: fixed;
        right: 20px;
        top: 20px;
        background-color: rgba(255,255,255,0.96);
        animation: fade 1s forwards, fade 1s forwards;
        animation-delay: 0s, 3s;
        animation-direction: normal, reverse;
    }

    @keyframes fade {
        from {opacity: 0;}
        to { opacity: 1;}
    }
</style>

<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">✅ Sucesso!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    Tipo de exame cadastrado com sucesso!
  </div>
</div>
@endisset

@endsection