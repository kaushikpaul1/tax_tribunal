@extends('layout/layout')

@section('space-work')

    <div class="table-responsive">
        <h3>Hearing Date: {{ $selectedDate }}</h3>
        @if ($hearingview->isEmpty())
            <h6>No hearing details found For this Date</h6>
        @else
            <form method="POST" action="{{ route('publish') }}">
                @csrf
                <table class="table table-striped table-bordered" style="width: 100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Serial Number</th>
                            <th>Case Number</th>
                            <th>Hearing Date & Time</th>
                            <th>Pettioner Name</th>
                            <th>Case</th>
                            <th>Hearing Details</th>
                            <th>Status</th>
                            <th>Check to Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sn = 1; @endphp
                        @foreach ($hearingview as $data)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $data->case_number }}</td>
                                {{-- <td>{{ $data->hearing_date }} </td> --}}
                                <td>{{ $data->hearingdetails_hearing_date }} & {{ $data->hearing_time }}</td>
                                {{-- <td>{{ \Carbon\Carbon::parse($data->hearingdetails_hearing_date)->format('Y-m-d') }}  & {{ \Carbon\Carbon::parse($data->hearing_time)->format('H:i') }}</td> --}}

                                <td>{{ $data->pfname }} {{ $data->pmname }} {{ $data->plname }}</td>
                                <td>{{ $data->pfname }} {{ $data->pmname }} {{ $data->plname }} Vs. {{ $data->rdept }} /
                                    {{ $data->rdesig }}</td>
                                <td><a href="{{ Storage::url($data->pdf_path) }}" target="_blank">View PDF</a></td>
                                <td>
                                    @if ($data->publishstatus == 0)
                                        <button class="btn btn-xs btn-danger rounded-pill" disabled>Not Published</button>
                                    @elseif ($data->publishstatus == 1)
                                        <button class="btn btn-xs btn-success rounded-pill"disabled>Published</button>
                                    @endif
                                </td>
                                <td>
                                    <input type="checkbox" name="selectedRows[]" value="{{ $data->id }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit">Publish </button>
            </form>
        @endif
    </div>
@endsection
