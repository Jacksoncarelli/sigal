{{ csrf_field() }}

<div id="datepair_edit">
    <div class="form-group">
        {!! Form::label('dia', 'Selecione o dia: ', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-7">
            {!! Form::text('datepicker', $agendaEdit->dia, array('id' => 'datepicker', 'name' => 'datepicker', 'class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('hora_inicio', 'Hora início: ', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-sm-3">
            {!! Form::text('hora_inicio', $agendaEdit->hora_inicio, array('id' => 'edit_hora_inicio', 'class' => 'form-control time start')) !!}
        </div>

        {!! Form::label('predio', 'Prédio:', array('class' => 'col-md-1 control-label')) !!}
        <div class="col-sm-3">
            {!! Form::select('predio_id', $predios, $agendaEdit->predio, array('id' => 'edit_predio_id', 'class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('hora_fim', 'Hora fim: ', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-sm-3">
            {!! Form::text('hora_fim', $agendaEdit->hora_fim, array('id' => 'edit_hora_fim', 'class' => 'form-control time end')) !!}
        </div>

        {!! Form::label('sala', 'Sala:', array('class' => 'col-md-1 control-label')) !!}
        <div class="col-sm-3">
            {!! Form::select('sala_id', $salas, $agendaEdit->sala_id, array('id' => 'edit_sala_id', 'class' => 'form-control')) !!}

        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('professor', 'Professor:', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-sm-7">
        {!! Form::select('prof_id', $profs, $agendaEdit->prof_id, array('class' => 'form-control', 'id' => 'prof_id')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tipo', 'Finalidade do uso: ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-sm-7">
        {!! Form::text('tipo', $agendaEdit->tipo, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('descricao', 'Descrição (opcional): ', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-7">
        {!! Form::text('descricao', $agendaEdit->descricao, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="modal-footer">
    <div align="center">
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Deletar', array('class' => 'btn btn-md btn-deletar', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete')) !!}
        {!! Form::submit('Salvar', array('class' => 'btn btn-md btn-confirm')) !!}
    </div>
</div>