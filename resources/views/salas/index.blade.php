@extends('layouts.template')

@section('content')


    <section class="wrap">
        <div class="container">
            <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                Adicionar nova sala
            </button>

            @include('salas.create')

            <p></p>
            <legend></legend>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Salas</h3>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                        <thead>


                        <tr>
                            <th>Prédio</th>
                            <th>Andar</th>
                            <th>Número</th>
                            <th>Capacidade</th>
                            <th>Tipo</th>
                            <th width="20%">Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($salas as $sala)
                            <tr >
                                <td >{{ $sala->predio }}</td>
                                <td>{{ $sala->andar }}</td>
                                <td>{{ $sala->numero }}</td>
                                <td>{{ $sala->capacidade }}</td>
                                <td>{{ $sala->tipo }}</td>
                                <td align="center">
                                    <button class="btn btn-editar  btn-sm" data-toggle="modal"
                                            onclick="editModal({{ $sala->id }})">
                                        <i class="glyphicon glyphicon-pencil"></i>   Editar
                                    </button>
                                    <button class="btn  btn-deletar  btn-sm" type="button" data-toggle="modal" data-target="#confirmDelete">
                                        <i class="glyphicon glyphicon-trash"></i> Deletar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    {!! $salas->render() !!}
                </div>
            </div>
        </div>
        @include('salas.delete_confirm')

        <script>
            function editModal(id) {
                $.ajax({
                    method: 'get',
                    url: '/salas/' + id + '/edit'}).then(function(data) {
                    $(data).modal()
                });
            }
        </script>
        </div>
    </section>

@stop