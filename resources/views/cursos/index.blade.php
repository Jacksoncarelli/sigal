@extends('layouts.template')

@section('content')

    <section class="wrap">
        <div class="container">
            <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                Adicionar novo Curso
            </button>

            @include('cursos.create')

            <p></p>
            <legend></legend>

            <div class="panel  panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-male fa-fw"></i>Cursos</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Coordenador</th>
                                <th>Fone</th>
                                <th width="20%">Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->nome_curso }}</td>
                                    <td>{{ $curso->coordenador }}</td>
                                    <td>{{ $curso->fone }}</td>
                                    <td align="center">
                                        <button class="btn btn-editar btn-sm" data-toggle="modal"
                                                onclick="editModal({{ $curso->id }})">
                                            <i class="glyphicon glyphicon-pencil"></i>  Editar
                                        </button>
                                        <button class="btn btn-deletar btn-sm" type="button" data-toggle="modal" data-target="#confirmDelete">
                                            <i class="glyphicon glyphicon-trash"></i> Deletar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {!! $cursos->render() !!}
                    </div>
                </div>
            </div>

            @include('cursos.delete_confirm')

            <script>
                function editModal(id) {
                    $.ajax({
                        method: 'get',
                        url: '/cursos/' + id + '/edit'}).then(function(data) {
                        $(data).modal()
                    });
                }
            </script>
        </div>
    </section>
    <br>
@stop
