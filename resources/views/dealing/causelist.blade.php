@extends('layout/layout')

@section('space-work')
    {{-- <h2> Select Date For Cause List</h2>
    
    <form method="POST" action="{{ route('showcauselist') }}">
        @csrf
        <label for="selected_date">Select Date:</label>
        <input type="date" id="selected_date" name="selected_date" required>
        <button type="submit">Submit</button>
    </form> --}}
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Select Date For Cause List</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('showcauselist') }}">
                            @csrf
                            <div class="form-group">
                                <label for="selected_date">Select Date:</label>
                                <input type="date" id="selected_date" name="selected_date" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
