{!! csrf_field() !!}

<div class="form-group" >
    {!! Form::hidden('dia', '', array('id' => 'dia')) !!}
</div>

<div id="datepair_insert">
    <div class="form-group">

        {!! Form::label('hora_inicio', 'Hora início: ', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::text('hora_inicio', '', array('id' => 'hora_inicio', 'class' => 'form-control time start', 'maxlength' => '5')) !!}
        </div>

        {!! Form::label('predio', 'Prédio:', array('class' => 'col-md-1 control-label')) !!}
        <div class="col-md-3">
            {!! Form::select('predio_id', $predios, Input::old('predio_id'), array('id' => 'predio_id', 'class' => 'form-control')) !!}
        </div>
        <div class="col-md-10">
            <br>
            </div>
        {!! Form::label('hora_fim', 'Hora fim: ', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-3">
            {!! Form::text('hora_fim', '', array('id' => 'hora_fim', 'class' => 'form-control time end', 'maxlength' => '5')) !!}
        </div>
        {!! Form::label('sala', 'Sala:', array('class' => 'col-md-1 control-label')) !!}

        <div class="col-md-3">
            {!! Form::select('sala_id', array(), '', array('id' => 'sala_id', 'class' => 'form-control')) !!}
        </div>
    </div>
</div>






<div class="form-group">
    {!! Form::label('professor', 'Professor:', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-7">
        {!! Form::select('prof_id', $profs, Input::old('prof_id'), array('class' => 'form-control', 'id' => 'prof_id')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tipo', 'Finalidade do uso: ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-7">
        {!! Form::text('tipo', 'Aula', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('descricao', 'Descrição (opcional): ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-7">
        {!! Form::text('descricao', '', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="modal-footer">
    <div align="center">
        {!! Form::submit('OK', array('class' => 'btn btn-lg btn-confirm')) !!}
    </div>
</div>