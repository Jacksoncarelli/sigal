@extends('layouts.template')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.css') }}">
@endsection

@section('script')

    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/bower_components/fullcalendar/dist/lang/pt-br.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2014-06-12',
                defaultView: 'month',
                editable: true,
                hiddenDays: [0],
                aspectRatio: 4
            });
        });
    </script>
@endsection

@section('content')
    <div id="calendar"></div>
@endsection