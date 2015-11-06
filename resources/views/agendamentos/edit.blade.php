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
                        'disableTimeRanges': [
                            ['00:00', '07:00'],
                            ['22:30', '23:59']
                        ]
                    });
                    $('#datepair_edit').datepair();

                    function fechar() {
                        $('.modal-backdrop').fadeOut(500);
                        $('.modal-backdrop .in').fadeOut(500);
                    }

                    /*
                     * Transforma a string retornada do Controller em um JSON.
                     */
                    function arrayToJSON(arr) {
                        //troca os caracteres &quot; por "
                        arr = arr.replace(/&quot;/g, '"');
                        return $.parseJSON(arr);
                    }

                    /*
                     * Limpa o select de salas e coloca apenas as salas do predio selecionado como opção
                     */
                    function setSalasOnSelect() {
                        var salas = '{{ $salas }}';
                        var predios = '{{ $predios_ids }}';

                        //transforma o JSON do controller num JSON decente
                        salas = arrayToJSON(salas);
                        predios = arrayToJSON(predios);

                        //limpa as opções do select sala
                        $('#edit_sala_id').empty();

                        //define como opções apenas as salas que possuem o mesmo id do prédio
                        $.each(predios, function(id, predio) {
                            if($('#edit_predio_id').val() == predio) {
                                $('#edit_sala_id').append($('<option>', {
                                    value: id,
                                    text: salas[id]
                                }));
                            }
                        });
                    }

                    //chamada quando o usuário muda o predio
                    $('#edit_predio_id').change(function() {
                        setSalasOnSelect();
                    });
                </script>
            </div>
        </div>
    </div>
</div>
