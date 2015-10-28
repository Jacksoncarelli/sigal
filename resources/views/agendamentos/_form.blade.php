{!! csrf_field() !!}

<div class="form-group" >
    {!! Form::hidden('dia', '', array('id' => 'dia')) !!}
</div>

<div class="form-group">
    {!! Form::label('hora_inicio', 'Hora início: ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-sm-3">
        {!! Form::text('hora_inicio', '', array('id' => 'hora_inicio', 'class' => 'form-control', 'maxlength' => '5', 'readonly' => 'true')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('hora_fim', 'Hora fim: ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-sm-3">
        {!! Form::select('hora_fim', $horas, Input::old('hora_inicio'), array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('predio', 'Prédio:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-2">
        {!! Form::select('predio_id', $predios, Input::old('predio_id'), array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('sala', 'Sala:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-2">
        {!! Form::select('sala_id', $salas, Input::old('sala_id'), array('class' => 'form-control', 'id' => 'sala_id')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('professor', 'Professor:', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-sm-5">
        {!! Form::select('prof_id', $profs, Input::old('prof_id'), array('class' => 'form-control', 'id' => 'prof_id')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tipo', 'Finalidade do uso: ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('tipo', 'Aula', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('descricao', 'Descrição (opcional): ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-5">
        {!! Form::text('descricao', '', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="modal-footer">
    <div align="center">
        {!! Form::submit('OK', array('class' => 'btn btn-lg btn-confirm')) !!}
    </div>
</div>