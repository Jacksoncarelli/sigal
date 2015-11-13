@extends('layouts.template')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/datepicker/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/timepicker/jquery.timepicker.css') }}">
@endsection

@section('pos-script')
    <script src="{{ asset('/assets/datepicker/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('/datepair/jquery.datepair.min.js') }}"></script>

    <script src="{{ asset('/js/dateformat.min.js') }}"></script>

    <script src="{{ asset('/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/bower_components/fullcalendar/dist/lang/pt-br.js') }}"></script>

    <script>
        var calendar = $('#calendar');

        calendar.fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            businessHours: {
                start: '07:00',
                end: '23:00'
            },
            minTime: '07:00',
            maxTime: '22:30',
            editable: false,
            aspectRatio: 3.25,

            dayClick: function(date) {
                var moment = calendar.fullCalendar('getDate');

                //o usuario nao precisa reservar a sala para o passado ;)
                if (date.format() < moment.format('YYYY-MM-DD')) {
                    alert('Você não pode reservar neste dia!');
                }
                else {
                    var view = calendar.fullCalendar('getView');

                    //verifica se o calendario está no modo mês
                    if (view.name == 'month') {
                        calendar.fullCalendar('changeView', 'agendaDay');
                        calendar.fullCalendar('gotoDate', date);
                    } else {
                        //passa o dia para um campo hidden para depois guardar no banco
                        $('#dia').val(date.format('YYYY-MM-DD'));

                        //passa para o form a data e a hora
                        $('#myModalLabel').text('Data: ' + date.format('DD/MM/YYYY'));
                        $('#hora_inicio').timepicker('setTime', date.format('hh:mm'));
                        $('#hora_fim').timepicker('setTime', date.format('hh:mm'));

                        /*
                        var newDate = new Date(date.format('YYYY-MM-DD') + ' ' + date.format('hh:mm'));
                        newDate.setHours(newDate.getHours() + 1);
                        var hora_fim = newDate.getHours() + ':' + newDate.getMinutes();

                        $('#hora_fim').timepicker('setTime', hora_fim);
                        */

                        $('#createModal').modal('show');
                    }
                }
            },

            eventClick: function(event) {
                //deleta o modal para assim instancia-lo novamente
                $('#editModal').remove();

                $.ajax({
                    method: 'get',
                    url: '/agendamentos/' + event.id + '/edit'}).then(function(data) {
                    $(data).modal()
                });
            }
        });

        $('#datepair_insert .time').timepicker({
            'showDuration': true,
            'timeFormat': 'H:i',
            'minTime': '07:00',
            'maxTime': '22:00'
        });
        $('#hora_inicio').timepicker('option', 'showDuration', false);
        $('#datepair_insert').datepair();

        /*
         * Consulta via AJAX os agendamentos que estão no intervalo dos dias visualizados pelo usuário.
         * Se está visualizando uma semana, um mês ou apenas um dia.
         */
        function getAgendamentos() {
            //baseado no view pega o primeiro e o ultimo dia
            var day_start = calendar.fullCalendar('getView').start;
            var day_end = calendar.fullCalendar('getView').end;
            //o ultimo dia sempre vem com um dia a mais por isso subtraio um dia
            day_end.subtract(1, 'days');

            var url = 'agendamentos/' + day_start.format() + '/' + day_end.format() + '/get-agendamentos';

            $.get(url, function(agendamentos) {
                var event = [];

                if(!$.isEmptyObject(agendamentos)) {
                    calendar.fullCalendar('removeEvents');
                    $.each(agendamentos, function (id, item) {
                        event['id'] = id;
                        event['title'] = item.title;
                        event['start'] = item.start;
                        event['end'] = item.end;

                        calendar.fullCalendar('renderEvent', event);
                    });
                }
            });
        }

        /*
         * Consulta as salas livres baseado no dia, horario e prédio selecionado
         */
        function getSalas() {
            var predio = $('#predio_id').val();
            var dia = $('#dia').val();
            var hora_inicio = $('#hora_inicio').val();
            var hora_fim = $('#hora_fim').val();
            var url = 'agendamentos/' + predio + '/' + dia + '/' + hora_inicio + '-' + hora_fim + '/get-salas';

            $('#sala_id').empty();

            /* passa para a URL 'agendamentos/{predio}/get-salas' o predio selecionado
             * que por sua vez em routes.php vai cair na função getSalas($predio)
             * onde retorna o JSON 'salas'
             */
            $.get(url, function(salas) {
                if($.isEmptyObject(salas)) {
                    $('#sala_id').append($('<option>', {
                        value: 0,
                        text: 'Sem sala',
                        disabled: true
                    }));
                } else {
                    $.each(salas, function (id, sala) {
                        $('#sala_id').append($('<option>', {
                            value: id,
                            text: sala
                        }));
                    });
                }
            });
        }

        /*
         * Verifica se os campos horario_inicio, horario_fim e predio_id estão setados para
         * chamar a função de consulta
         */
        function callGetSalas() {
            if(($('#hora_inicio').val().length == 5) && ($('#hora_fim').val().length == 5))
                if($('#predio_id option:selected').val() != 0)
                    getSalas();
        }

        //para popular o calendario quando a pagina carregar
        getAgendamentos();

        //quando o usuario mudar a view clicando nos botões Mês, Semana e Dia
        $('.fc-agendaDay-button').click(function() {
            getAgendamentos();
        });
        $('.fc-agendaWeek-button').click(function() {
            getAgendamentos();
        });
        $('.fc-month-button').click(function() {
            getAgendamentos();
        });

        //quando clicado na seta de anterior e proximo
        $('.fc-next-button').click(function() {
            getAgendamentos();
        });
        $('.fc-prev-button').click(function() {
            getAgendamentos();
        });
        $('.fc-today-button').click(function() {
            getAgendamentos();
        });

        //só funciona quando chama a função sem os parenteses
        //callGetSalas invés callGetSalas(), o pq só Zeus sabe :<
        $('#predio_id').change(callGetSalas);
        $('#hora_inicio').change(callGetSalas);
        $('#hora_fim').change(callGetSalas);
    </script>
@endsection

@section('content')
    @include('agendamentos.create')

    <div id="calendar"></div>
@endsection