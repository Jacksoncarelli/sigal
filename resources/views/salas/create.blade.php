<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" align="center">
    <div class="modal-dialog">
        <div class="modal-content col-lg-9">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" onclick="fechar();"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span>
                </button>


                <h4 class="modal-title" id="myModalLabel">Cadastro de Salas</h4>
            </div>

            <div class="modal-body col-sm-pull-0">
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {!! Form::open(array('route' => 'salas.store', 'class' => 'form-horizontal')) !!}

                <div class="form-group">
                    {!! Form::label('predio', 'Predio:', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('predio', Input::old('predio_au'), array('class' => 'form-control', 'placeholder' => 'Nome do predio')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('andar', 'Andar:', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('andar', Input::old('numero'), array('class' => 'form-control', 'placeholder' => 'Andar do predio')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('numero', 'Numero:', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('numero', Input::old('numero'), array('class' => 'form-control', 'placeholder' => 'Numero da sala')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('capacidade', 'Capacidade:', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-sm-9">
                        {!! Form::text('capacidade', Input::old('capacidade'), array('class' => 'form-control', 'placeholder' => 'Capacidade')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo:', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-sm-3">
                        {!! Form::select('tipo', array('Laboratorio' => 'Laboratorio', 'Auditorio' => 'Auditorio'), 'Laboratorio') !!}
                    </div>
                </div>

                <div class="form-group">
                    <div align="center">
                        {!! Form::submit('Cadastrar', array('class' => 'btn btn-lg btn-primary')) !!}
                    </div>
                </div>

                {!! Form::close() !!}

                <script>
                    function fechar(){
                        $('.modal-backdrop').fadeOut(5000);
                        $('.modal-backdrop .in').fadeOut(5000);
                    }
                </script>

            </div>
        </div>
    </div>
</div>
