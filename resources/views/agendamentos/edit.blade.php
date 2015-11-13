<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="close" data-dismiss="modal" onclick="fechar();"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="center">Editar agendamento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        @if ($errors->any())
                            <div class="alert alert-deletar">
                                <ul>
                                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {!! Form::model($agendaEdit, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('agendamentos.update', $agendaEdit->id))) !!}
                    @include('agendamentos._form_edit')
                {!! Form::close() !!}

                @include('agendamentos.delete_confirm')

                <script>
                    $('#datepicker').datepicker({
                        dateFormat: 'dd/mm/yy',
                        onSelect: function() {
                            $('#datepicker').val(this.value);
                        }
                    });

                    $('#datepair_edit .time').timepicker({
                        'showDuration': true,
                        'timeFormat': 'H:i',  //formato 24 horas, para mudar para modo americano usar g:ia
                        'minTime': '07:00',
                        'maxTime': '22:00'
                    });
                    $('#edit_hora_inicio').timepicker('option', 'showDuration', false);
                    $('#datepair_edit').datepair();

                    function fechar() {
                        $('.modal-backdrop').fadeOut(500);
                        $('.modal-backdrop .in').fadeOut(500);
                    }

                    function getSalas() {
                        var predio = $('#edit_predio_id').val();
                        var dia = $('#datepicker').val();
                        var hora_inicio = $('#edit_hora_inicio').val();
                        var hora_fim = $('#edit_hora_fim').val();

                        //split('/') => divide o dia em um array => [dd, mm, yyyy]
                        //reverse() => depois reverte a ordem do array =. [yyyy, mm, dd]
                        //join() => e por fim une os valores do array com um - entre eles => yyyy-mm-dd
                        dia = dia.split('/').reverse().join('-');

                        var url = 'agendamentos/' + predio + '/' + dia + '/' + hora_inicio + '-' + hora_fim + '/get-salas';

                        $('#edit_sala_id').empty();

                        /* passa para a URL 'agendamentos/{predio}/get-salas' o predio selecionado
                         * que por sua vez em routes.php vai cair na função getSalas($predio)
                         * onde retorna o JSON 'salas'
                         */
                        $.get(url, function(salas) {
                            if($.isEmptyObject(salas)) {
                                $('#edit_sala_id').append($('<option>', {
                                    value: 0,
                                    text: 'Sem sala',
                                    disabled: true
                                }));
                            } else {
                                $.each(salas, function (id, sala) {
                                    $('#edit_sala_id').append($('<option>', {
                                        value: id,
                                        text: sala
                                    }));
                                });
                            }
                        });
                    }

                    function callGetSalas() {
                        if(($('#edit_hora_inicio').val().length == 5) && ($('#edit_hora_fim').val().length == 5))
                            if($('#edit_predio_id option:selected').val() != 0)
                                getSalas();
                    }

                    /* associa ao change a função callGetSalas() e depois desassocia
                     * isto pq antes a função ficava acumulando a chamada da função
                     *
                     * OBS: a função deve ser chamada sem os parenteses ()
                     */
                    $('#datepicker').off('change').on('change', callGetSalas);
                    $('#edit_predio_id').off('change').on('change', callGetSalas);
                    $('#edit_hora_inicio').off('change').on('change', callGetSalas);
                    $('#edit_hora_fim').off('change').on('change', callGetSalas);
                </script>
            </div>
        </div>
    </div>
</div>
