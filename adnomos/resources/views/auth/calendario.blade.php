@extends('auth.layout.dashboard')
@section('estilo')
    <link rel="stylesheet" href="{{asset('views/css/calendario.css')}}">
    
    
@endsection
@section('content')
    <div id="calendar"></div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: ''
                },
                events: 'calendario/casos'
            });

            calendar.render();
        });
    </script>
@endsection