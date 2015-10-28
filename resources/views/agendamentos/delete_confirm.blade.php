<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Confirmar exclusão</h3>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que desejar remover o agendamento?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('agendamentos.destroy', $agendaEdit->id))) !!}
                {!! Form::submit('Deletar', array('class' => 'btn btn-deletar')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>