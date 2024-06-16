@extends('layout/layout')

@section('space-work')
    <h1>Selected Cases For Generating Cause List</h1>
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
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Acknowledgment Number</th>
                    <th>Case Number</th>
                    <th>Petitioner Name</th>
                    <th>Petitioner Contact</th>
                    <th>Respondent Department</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($cases as $index => $case) --}}
                @foreach ($cases as $index => $case)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $case->acknowledgment_number }}</td>
                        <td>{{ $case->case_number }}</td>
                        {{-- <td>{{ $case->pfname }} {{ $case->pmname }} {{ $case->plname }}</td> --}}
                        <td>
                            {{ $case->pfname }}
                            @if ($case->pmname != '')
                                {{ $case->pmname }}
                            @endif
                            {{ $case->plname }}
                        </td>
                        <td>{{ $case->pmobile }} <br> {{ $case->pemail }}</td>
                        <td>{{ $case->rdept }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form name="assignBench" id="assignBench" action="{{ route('assignBench') }}" method="POST">
            @csrf
            <input type="hidden" name="acknowledgment_number"
                value="{{ implode(',', $cases->pluck('acknowledgment_number')->toArray()) }}">
            <input type="hidden" name="case_number" value="{{ implode(',', $cases->pluck('case_number')->toArray()) }}">

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group mt-4">
                        <label for="bench">Assign Bench</label>
                        <select class="form-control" id="bench" name="bench" required>
                            <option value="">Select Bench</option>
                            <option value="DIVISION">DIVISION</option>
                            {{-- <option value="Bench 2">Bench 2</option>
                            <option value="Bench 3">Bench 3</option> --}}
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="judgeName">Judge Name</label>
                        <input type="text" class="form-control" id="judgeName" name="judgeName"
                            placeholder="Enter Judge Name" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group mt-4">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{-- <div class="text-center mt-3">
                <a href="{{ route('assignBench') }}" class="btn btn-primary">Submit</a>
            </div> --}}

        </form>
    </div>
@endsection
