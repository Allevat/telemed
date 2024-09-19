@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
        <div class="col-lg-8 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/exams">Meus exames</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
            </nav>
        </div>
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h1 class="fw-bold">
                       Novo exame
                    </h1>
                </div>
                <div class="card-body p-4">
                    @if(isset($exam->id))
                        <form action="/exams/{{$exam->id}}" method="POST">
                        @method('put')
                    @else 
                        <form action="/exams/new" method="POST">
                    @endif
                        @csrf
                        <div class="form-floating mb-3">
                        <select name="type_id" required class="form-select p-0 ps-3" aria-label="Default select example">
                            <option disabled selected value="">Selecione o tipo do exame</option>
                            @forelse($types as $type)
                                <option value="{{$type->id}}" {{$type->id == $exam->type->id ? 'selected' : null}}>
                                    {{$type->name}}
                                </option>
                            @empty
                                <option disabled value=""
                                        class="text-black text-center">
                                    Nenhum tipo cadastrado
                                </option>
                            @endforelse
                        </select>
                        </div>

                         <!-- Data -->
                         <div class="form-floating mb-3">
                            <input type="date" class="form-control" 
                                   id="date" name="date" placeholder="Data"
                                   value="{{ $exam->date ?? null }}">
                            <label for="date">Data</label>
                        </div>

                        <!-- Valor -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" 
                                   id="value" name="value" placeholder="Valor"
                                   value="{{ $exam->value ?? null }}">
                            <label for="value">Valor</label>
                        </div>

                        <!-- Botões -->
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
    Exame cadastrado com sucesso!
  </div>
</div>
@endisset

@endsection