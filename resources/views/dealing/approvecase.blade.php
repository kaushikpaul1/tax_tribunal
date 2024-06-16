@extends('layout/layout')

@section('space-work')
    <form action="{{ route('assignbechform') }}" method="GET">
        <h2>Approved List</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="example" style="width: 100%">
                @csrf
                <thead class="bg-primary">
                    <tr>
                        <th>Serial Number</th>
                        <th>Acknowledgment Number</th>
                        <th>Case Number</th>
                        <th>Case Type</th>
                        <th>Bench Type</th>
                        <th>Payment Details</th>
                        <th>Petitioner Name</th>
                        <th>Petitioner Contact</th>
                        <th>District</th>
                        <th>Respondent Department/Designation </th>
                        <th>Advocate Name</th>
                        <th>Status</th>
                        <th>Check For Cause List</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sn = 1; @endphp
                    @foreach ($approve as $case)
                        @if ($case->status == 1)
                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $case->acknowledgment_number }}</td>
                                <td>{{ $case->case_number }}</td>
                                <td>{{ $case->casetype }}</td>
                                <td>{{ $case->benchtype }}</td>
                                <td>{{ $case->paymentdetails }}</td>
                                <td>
                                    {{ $case->pfname }} <br>
                                    @if ($case->pmname != '')
                                        {{ $case->pmname }} <br>
                                    @endif
                                    {{ $case->plname }}
                                </td>
                                <td>{{ $case->pemail }}<br>{{ $case->pmobile }}</td>
                                <td>{{ $case->distname }}</td>
                                <td>{{ $case->rdept }} <br> {{ $case->rdesig }}</td>
                                <td>{{ $case->advocname }}</td>
                                <td class="bg-success text-white">
                                    @if ($case->status == 1)
                                        Approved
                                    @endif
                                </td>

                                <td>
                                    <div class="form-check d-flex justify-content-center align-items-center">
                                        {{-- <input type="checkbox" id="flexCheckChecked"> --}}
                                        {{-- <input type="checkbox" name="selectedCases[]" value="{{ $case->approvedcase_id}}"> --}}
                                        <input type="checkbox" name="selectedCases[]" value="{{ $case->acknowledgment_number}}">

                                    </div>
                                </td>


                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Button to generate cause list -->
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">Generate Cause List</button>
        </div>
    </form>
@endsection
