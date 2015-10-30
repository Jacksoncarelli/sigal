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

                    function fechar() {
                        $('.modal-backdrop').fadeOut(500);
                        $('.modal-backdrop .in').fadeOut(500);
                    }

                    function setHoraFim(select) {
                        $('#hora_fim option').each(function() {
                            //se a hora for menor que a de hora_inicio ela é oculta
                            if($(this).val() < select.value) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });

                        /*
                        pega o select hora_fim e define a opção com a hora que o select hora_inicio tem como selecionada
                        como a opção selected
                         */
                        $('#hora_fim option[value="' + select.value + '"]').prop('selected', true);
                    }
                </script>
            </div>
        </div>
    </div>
</div>
