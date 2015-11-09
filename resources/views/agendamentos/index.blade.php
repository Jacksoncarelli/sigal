@extends('layouts.template')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/datepicker/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/timepicker/jquery.timepicker.css') }}">
@endsection

@section('pos-script')
    <script src="{{ asset('/assets/datepicker/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('/datepair/datepair.min.js') }}"></script>
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
            'disableTimeRanges': [
                ['00:00', '07:00'],
                ['22:30', '23:59']
            ]
        });
        $('#datepair_insert').datepair();

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

        function callGetSalas() {
            if(($('#hora_inicio').val().length == 5) && ($('#hora_fim').val().length == 5))
                if($('#predio_id option:selected').val() != 0)
                    getSalas();
        }

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