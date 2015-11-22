@extends('layouts.mask')

{!! csrf_field() !!}

<div class="form-group" >
    {!! Form::label('nome', 'Nome:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-9">
        {!! Form::text('nome_curso', Input::old('nome_curso'), array('class' => 'form-control', 'placeholder' => 'Nome do curso')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('Coordenador', 'Coord.:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-9">
        {!! Form::text('coordenador', Input::old('coordenador'), array('class' => 'form-control', 'placeholder' => 'Nome do coordenador')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fone', 'Fone:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-9">
        {!! Form::text('fone', Input::old('fone'), array('class' => 'form-control phone', 'placeholder' => 'Ex.: (00) 0000-0000', 'id' => 'fone')) !!}
    </div>
</div>

<div class="modal-footer">
    <div align="center">
        {!! Form::submit('OK', array('class' => 'btn btn-lg btn-confirm')) !!}
    </div>
</div>