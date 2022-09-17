@extends('layouts.default')

@section('content')

<style>
    .grid-container {
        display: grid;
        grid-template-columns: 0.7fr 2fr;
    }
    .grid-item {
      padding-top: 10px;
      text-align: center;
    }
</style>

<section class="content"> 
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Agendamento de Consulta</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="label"><h4>{{ $professional->nome }}</h4></label>
            </div>
            <div class="row">
                <label class="label">{{ $professional->conselho }}  {{ $professional->rqe }}</label>
            </div>
        </div>
    </div>
    <br>
    <form action="{{route('agendamento.store')}}" method="POST">
        <input type="hidden" id="specId" name="specId" value={{$specId}}>
        <input type="hidden" id="profId" name="profId" value={{$profId}}>
        @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Informa seus dados</h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <label class="label"><b>Nome Completo</b></label>
                </div>
                <div class="row">
                    <div class="input-group">
                        <input required type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Nome completo">
                    </div>
                </div>

                <div class="row">
                    <label class="label"><b>Como Conheceu?</b></label>
                </div>
                <div class="row">
                    <div class="input-group">
                        <select class="form-control" id="source" name="source" tabindex="-1" aria-hidden="true">
                            @foreach($sources as $source)
                                <option value={{$source->origem_id}}>{{$source->nome_origem}}</option>
                            @endforeach
                        </select>  
                    </div>
                </div>

                <div class="row">
                    <label class="label"><b>Data de Nascimento</b></label>
                </div>
                <div class="row">
                    <div class="input-group">
                        <input required type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Data de Nascimento">
                    </div>
                </div>

                <div class="row">
                    <label class="label"><b>CPF</b></label>
                </div>
                <div class="row">
                    <div class="input-group">
                        <input required type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                    </div>
                </div>
                <br>
                <span class="input-group-append">
                    <button type="submit" class="btn btn-sm btn-success">Solicitar Horários</button>
                </span>
            </div>
            <div class="card-footer">
                <a href="/" class="btn btn-default">Retornar</a>
            </div>
        </div>
    </form>
</section>
@stop
