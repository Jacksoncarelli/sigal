{!! csrf_field() !!}

<div class="form-group">
    {!! Form::label('predio', 'Prédio:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('predio', Input::old('predio'), array('class' => 'form-control', 'placeholder' => 'Nome do prédio', 'autofocus')) !!}
    </div>
    {!! Form::label('andar', 'Andar:', array('class' => 'col-md-1 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('andar', Input::old('andar'), array('class' => 'form-control', 'placeholder' => 'Andar do prédio')) !!}
    </div>
</div>



<div class="form-group">
    {!! Form::label('numero', 'Número:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('numero', Input::old('numero'), array('class' => 'form-control', 'placeholder' => 'Número da sala')) !!}
    </div>

    {!! Form::label('tipo', 'Tipo:', array('class' => 'col-md-1 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::select('tipo', array('Laboratorio' => 'Laboratório', 'Auditorio' => 'Auditório'), 'Laboratorio', array('class' => 'form-control')) !!}
    </div>

</div>


<div class="form-group">
    {!! Form::label('capacidade', 'Cap.:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('capacidade', Input::old('capacidade'), array('class' => 'form-control', 'placeholder' => 'Capacidade')) !!}
    </div>


    {!! Form::label('obs', 'Obs:', array('class' => 'col-md-1 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('obs', Input::old('obs'), array('class' => 'form-control', 'placeholder' => '(Opcional)')) !!}
    </div>


</div>
<legend></legend>
<div class="form-group">
    {!! Form::label('recurso', 'Recurso disponivel:', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('recurso', Input::old('recurso'), array('class' => 'form-control', 'placeholder' => 'Recurso disponível')) !!}
    </div>
    <button type="button" class="btn btn-primary">+</button>

    <div class="col-sm-12"><br></div>


    {!! Form::label('descricao', 'Descricao:', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('descricao', Input::old('descricao'), array('class' => 'form-control', 'placeholder' => '(Opcional)')) !!}
    </div>  <div class="col-sm-12"><br></div>
    <div class="col-sm-10">
    {!! Form::label('acessibilidade', 'Possui acessibilidade', array('class' => 'col-md-5 control-label')) !!}

        {!! Form::checkbox('acessibilidade', '1', true) !!}
    </div>

</div>

<div class="modal-footer">
    <div align="center">
        {!! Form::submit('Salvar', array('class' => 'btn btn-lg btn-success')) !!}
    </div>
</div>
