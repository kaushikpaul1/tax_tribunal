{{-- <!DOCTYPE html>
<html>
<head>
    <title>Hearing Details</title>
    <style>
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .col {
            flex: 1;
            padding: 0 10px;
        }
    </style>
</head>
<body>
    <h1>Hearing Details</h1>
    <div class="row">
        <div class="col">
            <p><strong>Acknowledgment Number:</strong> {{ $caseDetails->acknowledgment_number }}</p>
        </div>
        <div class="col">
            <p><strong>Case Number:</strong> {{ $caseDetails->case_number }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><strong>Case:</strong> {{ $caseDetails->pfname }} {{ $caseDetails->pmname }} {{ $caseDetails->plname }} Vs. {{ $caseDetails->rdept }} / {{ $caseDetails->rdesig }}</p>
        </div>
        <div class="col">
            <p><strong>Name:</strong> {{ $caseDetails->pfname }} {{ $caseDetails->pmname }} {{ $caseDetails->plname }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><strong>Advocate Name:</strong> {{ $caseDetails->advocname }}</p>
        </div>
        <div class="col">
            <p><strong>Judge Name:</strong> {{ $caseDetails->judge_name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><strong>Bench:</strong> {{ $caseDetails->bench }}</p>
        </div>
        <div class="col">
            <p><strong>Hearing Date & Time:</strong> {{ $caseDetails->hearing_date }} &nbsp; {{ $caseDetails->hearing_time }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><strong>Details:</strong></p>
        </div>
        <div class="col">
         
            <div>{!! nl2br(e($data['hearing_details'])) !!}</div>
        </div>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hearing Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* .row {
            margin-bottom: 10px;
        } */
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Hearing Details</h1>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Acknowledgment Number:</strong> {{ $caseDetails->acknowledgment_number }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Case Number:</strong> {{ $caseDetails->case_number }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Case:</strong> {{ $caseDetails->pfname }} {{ $caseDetails->pmname }} {{ $caseDetails->plname }} Vs. {{ $caseDetails->rdept }} / {{ $caseDetails->rdesig }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $caseDetails->pfname }} {{ $caseDetails->pmname }} {{ $caseDetails->plname }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Advocate Name:</strong> {{ $caseDetails->advocname }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Judge Name:</strong> {{ $caseDetails->judge_name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Bench:</strong> {{ $caseDetails->bench }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Hearing Date & Time:</strong> {{ $caseDetails->hearing_date }} &nbsp; {{ $caseDetails->hearing_time }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Details:</strong></p>
            </div>
            <div class="col-md-6">
                <div>{!! nl2br(e($data['hearing_details'])) !!}</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
