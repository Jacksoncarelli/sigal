@extends('layouts.template')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/datepicker/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/timepicker/jquery.timepicker.css') }}">
@endsection

@section('script')
    <script src="{{ asset('/assets/datepicker/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('/datepair/datepair.min.js') }}"></script>
    <script src="{{ asset('/datepair/jquery.datepair.min.js') }}"></script>

    <script src="{{ asset('/js/dateformat.min.js') }}"></script>

    <script src="{{ asset('/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/bower_components/fullcalendar/dist/lang/pt-br.js') }}"></script>

    <script>
        $(document).ready(function() {
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

                /* o formato da hora de inicio e fim do Fullcalendar é a seguinte
                 '2015-12-31T12:30:00'
                 por isso é chamado $agenda['dia']T$agenda['hora']
                 */
                events: [
                    @foreach($agendamentos as $agenda)
                        {
                            id: '{{ $agenda['id'] }}',
                            day: '{{ $agenda['dia'] }}',
                            local: '{{ $agenda['sala_id'] }}',
                            prof: '{{ $agenda['prof_id'] }}',
                            tipo: '{{ $agenda['tipo'] }}',

                            title: '{{ utf8_decode($agenda['tipo']) }} - {{ $profs->get($agenda['prof_id']) }}',
                            start: '{{ $agenda['dia'] }}T{{ $agenda['hora_inicio'] }}',
                            end: '{{ $agenda['dia'] }}T{{ $agenda['hora_fim'] }}'
                        },
                    @endforeach
                    ],

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

                            var newDate = new Date(date.format('YYYY-MM-DD') + ' ' + date.format('hh:mm'));
                            newDate.setHours(newDate.getHours() + 1);

                            var hora_fim = newDate.getHours() + ':' + newDate.getMinutes();
                            $('#hora_fim').timepicker('setTime', hora_fim);

                            $('#createModal').modal('show');
                        }
                    }
                },

                eventClick: function(event) {
                    $.ajax({
                        method: 'get',
                        url: '/agendamentos/' + event.id + '/edit'}).then(function(data) {
                        $(data).modal()
                    });
                }
            });
        });

        $('#datepair_insert .time').timepicker({
            'showDuration': true,
            'timeFormat': 'H:i',
            'disableTimeRanges': [
                ['00:00', '07:00'],
                ['22:30', '23:59']
            ]
        });
        $('#datepair_insert').datepair();

        function callGetSalas() {
            $('#sala_id').empty();

            /* passa para a URL 'agendamentos/{predio}/get-salas' o predio selecionado
             * que por sua vez em routes.php vai cair na função getSalas($predio)
             * onde retorna o JSON 'salas'
             */
            $.get('agendamentos/' + $('#predio_id').val() + '/get-salas', function(salas) {
                $.each(salas, function(id, sala) {
                    $('#sala_id').append($('<option>', {
                        value: id,
                        text: salas[id]
                    }));
                });
            });
        }

        //chamada quando a página carrega
        callGetSalas();

        //chamada quando o usuário muda o predio
        $('#predio_id').change(function() {
            callGetSalas();
        });
    </script>
@endsection

@section('content')
    @include('agendamentos.create')

    <div id="calendar"></div>
@endsection