{!! csrf_field() !!}

<div class="form-group">
    {!! Form::label('predio', 'Predio:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('predio', Input::old('predio'), array('class' => 'form-control', 'placeholder' => 'Nome do predio', 'autofocus')) !!}
    </div>
    {!! Form::label('andar', 'Andar:', array('class' => 'col-md-1 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('andar', Input::old('andar'), array('class' => 'form-control', 'placeholder' => 'Andar do predio')) !!}
    </div>
</div>



<div class="form-group">
    {!! Form::label('numero', 'Numero:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('numero', Input::old('numero'), array('class' => 'form-control', 'placeholder' => 'Numero da sala')) !!}
    </div>

    {!! Form::label('capacidade', 'Cap.:', array('class' => 'col-md-1 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('capacidade', Input::old('capacidade'), array('class' => 'form-control', 'placeholder' => 'Capacidade')) !!}
    </div>

</div>


<div class="form-group">
    {!! Form::label('tipo', 'Tipo:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::select('tipo', array('Laboratorio' => 'Laboratorio', 'Auditorio' => 'Auditorio'), 'Laboratorio', array('class' => 'form-control')) !!}
    </div>

    {!! Form::label('acessibilidade', 'Possui acessibilidade', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('acessibilidade', '1', true) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('recurso', 'Recurso disponivel:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('recurso', Input::old('recurso'), array('class' => 'form-control', 'placeholder' => 'Recurso disponivel')) !!}
    </div>

    {!! Form::label('descricao', 'Descricao:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('descricao', Input::old('descricao'), array('class' => 'form-control', 'placeholder' => '(Opcional)')) !!}
    </div>

    {!! Form::label('obs', 'Obs:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('obs', Input::old('obs'), array('class' => 'form-control', 'placeholder' => '(Opcional)')) !!}
    </div>
</div>

<div class="modal-footer">
    <div align="center">
        {!! Form::submit('OK', array('class' => 'btn btn-lg btn-confirm')) !!}
    </div>
</div>
