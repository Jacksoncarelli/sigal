@extends('layouts.mask')
{!! csrf_field() !!}

<div class="form-group">
    {!! Form::label('nome', 'Nome:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-9">
        {!! Form::text('nome', Input::old('nome_au'), array('class' => 'form-control', 'placeholder' => 'Nome do professor','required' => 'required'))  !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('Curso', 'RA:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('ra', Input::old('ra'), array('class' => 'form-control', 'placeholder' => 'RA','required' => 'required')) !!}
    </div>
    {!! Form::label('cgu', 'CGU:', array('class' => 'col-md-1 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('cgu', Input::old('cgu'), array('class' => 'form-control', 'placeholder' => 'CGU')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('curso', 'Curso:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-9">
        {!! Form::select('curso_id', $cursos, Input::old('curso_id'), array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) !!}
    </div>
    {!! Form::label('fone', 'Fone:', array('class' => 'col-md-1 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('fone', Input::old('fone'), array('class' => 'form-control phone', 'placeholder' => 'Ex.: (00) 0000-0000', 'id' => 'fone')) !!}
    </div>
</div>

<div class="modal-footer">
    <div align="center">
        {!! Form::submit('OK', array('class' => 'btn btn-lg btn-confirm')) !!}
    </div>
</div>