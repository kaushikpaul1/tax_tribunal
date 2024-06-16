@extends('layout/layout')

@section('space-work')
    <div class="container-fluid mt-2">

        <h1>Hearing List for {{ $selectedDate }}</h1>

        <div class="table-responsive">

            <table class="table table-striped table-bordered " id="example" style="width: 100%">

                <thead class="bg-primary">
                    <tr>
                        <th>Serial Number</th>
                        <th>Acknowledgment Number</th>
                        <th>Case Number</th>
                        {{-- <th>Case Type</th> --}}
                        <th>Bench Type</th>
                        <th>Case Type</th>
                        <th>Judge Name</th>
                        <th>Petitioner Name</th>
                        <th>Petitioner Contact</th>
                        <th>Petitioner District</th>
                        <th>Respondent Department/Designation </th>
                        <th>Advocate Name</th>
                        <th>Hearing Date&Time</th>
                        {{-- <th>Status</th> --}}
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @php $sn = 1; @endphp
                    @foreach ($hearing as $case)
                        <tr>
                            <td>{{ $sn++ }}</td>
                            <td>{{ $case->acknowledgment_number }}</td>
                            <td>{{ $case->case_number }}</td>
                            <td>{{ $case->bench }}</td>
                            <td>{{ $case->casetype }}</td>
                            <td>{{ $case->judge_name }}</td>

                            <td>
                                {{ $case->pfname }} <br>
                                @if ($case->pmname != '')
                                    {{ $case->pmname }} <br>
                                @endif
                                {{ $case->plname }}
                            </td>
                            <td>{{ $case->pemail }}<br>{{ $case->pmobile }}</td>
                            {{-- <td>{{ $case->pdistrict }}</td> --}}
                            <td>{{ $case->distname }}</td>
                            <td>{{ $case->rdept }} <br> {{ $case->rdesig }}</td>
                            <td>{{ $case->advocname }}</td>
                            <td>{{ $case->hearing_date }} <br> {{ $case->hearing_time }}</td>

                            {{-- <td class="bg-warning text-white">
                                @if ($case->status == 0)
                                    Pending
                                @endif
                            </td> --}}
                            <td>
                                {{-- <form action="{{ route('hearingentrycreate', $case->id) }}" method="GET"> --}}
                                <form
                                    action="{{ route('hearingentrycreate', ['assignbench_id' => $case->assignbench_id]) }}"
                                    method="GET">

                                    <button type="submit" class="btn btn-primary">Hearing Entry</button>
                                </form>
                                {{-- <button type="submit" class="btn btn-primary mt-1">Hearing Entry</button> --}}
                                <form
                                    action="{{ route('hearingentryprevious', ['assignbench_id' => $case->assignbench_id]) }}">
                                    <button type="submit" class="btn btn-primary mt-1">Show All Hearing</button>
                                </form>

                            </td>


                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
