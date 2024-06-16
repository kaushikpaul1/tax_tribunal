@extends('layout/layout')

@section('space-work')
    <h3>Previous Hearings for Case Number: {{ $case_number }}</h3>
    {{-- <h3>Previous Hearings for Case Number: {{ $acknowledgment_number }}</h3> --}}

    @if ($hearingDetails->isEmpty())
        <p>No hearing details found.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Serial Number</th>
                        <th>Date</th>
                        <th>Hearing Details</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sn = 1; @endphp
                    @foreach ($hearingDetails as $hearing)
                        <tr>
                            <td>{{ $sn++ }}</td>
                            <td>{{ $hearing->hearing_date }}</td>
                            <td><a href="{{ Storage::url($hearing->pdf_path) }}" target="_blank">View PDF</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
