@extends('layout/layout')

@section('space-work')
    <h2>Rejected List</h2>

    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="example" style="width: 100%">

            <thead class="bg-primary">
                <tr>
                    <th>Serial Number</th>
                    <th>Acknowledgment Number</th>
                    <th>Case Type</th>
                    <th>Bench Type</th>
                    <th>Payment Details</th>
                    <th>Petitioner Name</th>
                    <th>Petitioner Contact</th>
                    <th>District</th>
                    <th>Respondent Department/Designation </th>
                    <th>Advocate Name</th>
                    <th>Status</th>
                    <th>Reason For Rejection</th>

                </tr>
            </thead>



            <tbody>
                @php $sn = 1; @endphp
                @foreach ($reject as $case)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $case->acknowledgment_number }}</td>
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
                        {{-- <td>{{ $case->pdistrict }}</td> --}}
                        <td>{{ $case->distname }}</td>

                        <td>{{ $case->rdept }} <br> {{ $case->rdesig }}</td>
                        <td>{{ $case->advocname }}</td>
                        <td class="bg-danger text-white">
                            @if ($case->status == 2)
                                Rejected
                            @endif
                        </td>
                        <td>{{ $case->reason }}</td> <!-- Assuming this field exists in rejectcasemodel -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
