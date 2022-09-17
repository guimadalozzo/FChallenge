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
    <input type="hidden" id="storedCtrl" name="storedCtrl" value={{$stored}}>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Agendamento de Consulta</h3>
        </div>
        
        <div class="card-body">
            <div class="row">
                <label class="label"><b>Selecione uma Especialidade</b></label>
            </div>
            <div class="row">
                <form action="{{route('agendamento.list')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <select class="especialidades-dropdown" name="especialidade" id="especialidade" tabindex="-1" aria-hidden="true">
                            @foreach($especialidades as $item)
                                @if($spec == $item->especialidade_id)
                                    <option selected value={{$item->especialidade_id}}>{{$item->nome}}</option>
                                @else
                                    <option value={{$item->especialidade_id}}>{{$item->nome}}</option>
                                @endif
                            @endforeach
                        </select>  
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-danger">Buscar</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(isset($especialistas) and !empty($especialistas))
        <br>
        <div class="card card-default" id="specs-list">
            <div class="card-header">
                <h3 class="card-title">Especialistas encontrados</h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    @foreach($especialistas as $especialista)
                        <div class="col-md-6" style="padding-top: 5px; padding-bottom: 5px">
                            <div class="card card-widget widget-user">
                                <form action="{{route('agendamento.create')}}" method="POST">
                                    @csrf
                                <div class="grid-container">
                                    <input type="hidden" id="specId" name="specId" value={{$spec}}>
                                    <input type="hidden" id="profId" name="profId" value={{$especialista->profissional_id}}>
                                    <div class="grid-item">
                                        <img style="height:80px; width:80px; border-radius: 50%; padding-bottom: 5px" src="{{ $especialista->foto ?: asset('images/spec-default.png') }}" alt="User Avatar">
                                    </div>
                                    <div class="grid-item">
                                        <h4 class="widget-user-username">{{ $especialista->nome }}</h4>
                                        <h6 class="widget-user-desc">{{ $especialista->conselho }} {{ $especialista->rqe }}</h6>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <button type="submit" class="btn btn-success">Agendar</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</section>
@stop

@push('js')
<script>
    $(document).ready(function() {
        $('.especialidades-dropdown').select2();
        var swalCtrl = document.getElementById("storedCtrl").value;
        if (swalCtrl)
            Swal.fire({
                title: 'Sucesso!',
                text: 'Solicitação de horário registrada com sucesso!',
                icon: 'success',
                confirmButtonText: 'Ok!'
            })
    });
</script>
@endpush