@extends('layout/layout')

@section('space-work')
<div class="container mt-2">
    <h1>Hearing Entry</h1>
    <form action="{{ route('submit.hearing') }}" method="POST">
        @csrf
        <div class="card">
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
            <div class="card-header">
                <h5>Case Details</h5>
            </div>
            {{-- <div class="card-body">
                <p><strong>Acknowledgment Number:</strong> {{ $case->acknowledgment_number }}</p>
                <input type="hidden" name="acknowledgment_number" value="{{ $case->acknowledgment_number }}">
                <p><strong>Case Number:</strong> {{ $case->case_number }}</p>
                <p><strong>Case:</strong>{{ $case->pfname }} {{ $case->pmname }} {{ $case->plname }} Vs. {{ $case->rdept }} / {{ $case->rdesig }}</p>
                <p><strong>Name:</strong> {{ $case->pfname }} {{ $case->pmname }} {{ $case->plname }}</p>
                <p><strong>Advocate Name:</strong> {{ $case->advocname }}</p>
                <p><strong>Judge Name:</strong> {{ $case->judge_name }}</p>
                <p><strong>Bench:</strong> {{ $case->bench }}</p>
                <p><strong>Hearing Date & time:</strong> {{ $case->hearing_date }} &nbsp; {{ $case->hearing_time }}</p>
                <input type="hidden" name="hearing_date" value="{{ $case->hearing_date }}">
            </div> --}}
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p><strong>Acknowledgment Number:</strong> {{ $case->acknowledgment_number }}</p>
                        <input type="hidden" name="acknowledgment_number" value="{{ $case->acknowledgment_number }}">
                    </div>
                    <div class="col">
                        <p><strong>Case Number:</strong> {{ $case->case_number }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><strong>Case:</strong>{{ $case->pfname }} {{ $case->pmname }} {{ $case->plname }} Vs. {{ $case->rdept }} / {{ $case->rdesig }}</p>
                    </div>
                    <div class="col">
                        <p><strong>Name:</strong> {{ $case->pfname }} {{ $case->pmname }} {{ $case->plname }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><strong>Advocate Name:</strong> {{ $case->advocname }}</p>
                    </div>
                    <div class="col">
                        <p><strong>Judge Name:</strong> {{ $case->judge_name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><strong>Bench:</strong> {{ $case->bench }}</p>
                    </div>
                    <div class="col">
                        <p><strong>Hearing Date & time:</strong> {{ $case->hearing_date }} &nbsp; {{ $case->hearing_time }}</p>
                        <input type="hidden" name="hearing_date" value="{{ $case->hearing_date }}">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="mt-3">
            <h5>Hearing Details:</h5>
            <textarea name="hearing_details" id="editor" class="custom-editor form-control" ></textarea>
        </div>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-primary mt-1">Submit</button>
        </div>
    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
            editor.ui.view.editable.element.style.height = '300px';
            editor.editing.view.change(writer => {
                writer.setStyle('min-height', '300px', editor.editing.view.document.getRoot());
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
