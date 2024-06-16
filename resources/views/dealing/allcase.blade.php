@extends('layout/layout')

@section('space-work')
    <div class="container-fluid mt-2">

        <h2>Pending Cases</h2>

        <div class="table-responsive">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

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
                        <th>Petitioner District</th>
                        <th>Respondent Department/Designation </th>
                        <th>Advocate Name</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @php $sn = 1; @endphp
                    @foreach ($users as $case)
                        @if ($case->status == 0)
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
                                <td>{{ $case->district->distname }}</td>
                                <td>{{ $case->rdept }} <br> {{ $case->rdesig }}</td>
                                <td>{{ $case->advocname }}</td>
                                <td class="bg-warning text-white">
                                    @if ($case->status == 0)
                                        Pending
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('approveCase', $case->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Approve</button>
                                    </form>
                                    <button type="button" class="btn btn-danger mt-1 reject-btn" data-toggle="modal"
                                        data-target="#rejectModal_{{ $case->id }}">Reject</button>

                                    <!-- Rejection Reason Modal -->
                                    <div class="modal fade" id="rejectModal_{{ $case->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="rejectModalLabel_{{ $case->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="rejectModalLabel_{{ $case->id }}">
                                                        Reason for Rejection</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('rejectCase', $case->id) }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label
                                                                for="rejectionReason_{{ $case->id }}">Reason:</label>
                                                            <textarea class="form-control" id="rejectionReason_{{ $case->id }}" name="reason" rows="3" required></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-danger">Submit
                                                            Rejection</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
