@extends('layout/layout')

@section('space-work')
    <h1>Cause List for {{ $selectedDate }}</h1>

    @if ($cases->count() > 0)
        <ul>
            @foreach ($cases as $case)
                @if ($case->hearing_date == $selectedDate)
                    <li>{{ $case->acknowledgment_number }}</li>
                @endif
                {{-- <li>{{$case->hearing_date}}</li> --}}
            @endforeach
        </ul>
    @else
        <p>No cases found for the selected date.</p>
    @endif

@endsection

