@extends('layout/layout')

@section('space-work')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 mt-2  ">

                <div id="stepper1" class="bs-stepper ">
                    <div class="bs-stepper-header d-flex justify-content-between ">
                        <div class="container-fluid">
                            <div class="row ">
                                <div class="col-md-3 col-sm-12 ">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Case Registration</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 ">
                                    <!-- <div class="line d-md-none"></div> -->
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">&nbsp;&nbsp;Pettioner Details &nbsp;&nbsp;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 ">
                                    <!-- <div class="line d-md-none"></div> -->
                                    <div class="step" data-target="#test-l-3">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Respondent Details</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 ">

                                    <!-- <div class="line"></div> -->
                                    <div class="step" data-target="#test-l-4">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Advocate Details</span>
                                        </button>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3 col-sm-12 ">

                                <!-- <div class="line"></div> -->
                                <div class="step" data-target="#test-l-5">
                                    <button type="button" class="btn step-trigger">
                                        <span class="bs-stepper-circle">4</span>
                                        <span class="bs-stepper-label">Annexure Details</span>
                                    </button>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('store.data') }}" method="post">
                        @csrf
                        <div class="bs-stepper-content mt-0 bg-light">
                            <div id="test-l-1" class="content">
                                {{-- <p class="text-center">test 1</p> --}}
                                <p>GENERATE CASE REGISTRATION DETAILS</p>

                                <div class="form-group d-flex align-items-center ">
                                    <label for="dropdown" class=" case-margin"><strong>Case Type:</strong></label>
                                    <select class="form-select rounded-0 w-50 custom-select-dropdown "
                                        aria-label="Select an Option" name='casetype' id="dropdown">
                                        <option value="0">--SELECT TYPE OF CASE--</option>
                                        <option value="HEARING">HEARING</option>
                                        <option value="MOTION">MOTION</option>
                                        <option value="APPLICATION ORDER">APPLICATION ORDER</option>
                                    </select>
                                </div>

                                <div class="form-group d-flex align-items-center mt-3">
                                    <label for="dropdown" class="bench-margin"><strong>Select Bench
                                            Type:</strong></label>
                                    <select class="form-select rounded-0 w-50 ml-3 custom-select-dropdown"
                                        aria-label="Select an Option" name='benchtype' id="dropdown">
                                        <option value="0">--SELECT TYPE OF BENCH--</option>
                                        <option value="DIVISION">DIVISION</option>

                                    </select>
                                </div>
                                <div class="form-group d-flex align-items-center mt-3">

                                    <label for="" class='payment-margin'><strong>Enter Payment
                                            Details:</strong></label>
                                    <input type="text" name="paymentdetails"
                                        class="form-control rounded-0 w-50 custom-text-payment"
                                        placeholder="Enter payment UTR No." />

                                </div>


                                <button class="btn btn-primary" type="button"
                                    onclick="stepper1.previous()">Previous</button>
                                <button class="btn btn-primary" type="button" onclick="stepper1.next()">Next</button>
                            </div>
                            <div id="test-l-2" class="content">
                                {{-- <p class="text-center">test 2</p> --}}
                                <div class="form-group d-flex align-items-center ">

                                    <label for="" class=' mt-3 ptn-first-name'><strong>Pettioner First
                                            name:</strong></label>
                                    <input type="text" name="pfname"
                                        class="form-control rounded-0 w-50 mt-3 input-margin"
                                        placeholder="Enter First Name." />

                                </div>
                                <div class="form-group d-flex align-items-center ">

                                    <label for="" class=' mt-3 ptn-middle-name'><strong>Pettioner
                                            Middle
                                            name:</strong></label>
                                    <input type="text" name="pmname"
                                        class="form-control rounded-0 w-50 mt-3 input-margin"
                                        placeholder="Enter Middle Name." />

                                </div>
                                <div class="form-group d-flex align-items-center ">

                                    <label for="" class=' mt-3 ptn-last-name'><strong>Pettioner Last
                                            name:</strong></label>
                                    <input type="text" name="plname"
                                        class="form-control rounded-0 w-50 mt-3 input-margin"
                                        placeholder="Enter Last Name." />

                                </div>
                                <div class="form-group d-flex align-items-center ">

                                    <label for="" class=' mt-3 ptn-email'><strong>Pettioner
                                            Email:</strong></label>
                                    <input type="text" name="pemail"
                                        class="form-control rounded-0 w-50 mt-3 input-margin"
                                        placeholder="Enter email id." />

                                </div>
                                <div class="form-group d-flex align-items-center ">

                                    <label for="" class=' mt-3 ptn-phone'><strong>Pettioner
                                            Mobile:</strong></label>
                                    <input type="text" name="pmobile"
                                        class="form-control rounded-0 w-50 mt-3 input-margin"
                                        placeholder="Enter Mobile No." />

                                </div>
                                <div class="form-group d-flex align-items-center ">
                                    <label for="dropdown" class=" state-margin  mt-4"><strong>Choose
                                            State:</strong></label>
                                    <select class="form-select rounded-0 w-50 custom-select-dropdown  mt-4 "
                                        aria-label="Select an Option" id="dropdown" name="pstate">
                                        <option value="WB">WEST BENGAL</option>

                                    </select>
                                </div>
                                <div class="form-group d-flex align-items-center ">
                                    <label for="dropdown" class=" dist-margin  mt-4"><strong>Choose
                                            District:</strong></label>
                                    <select class="form-select rounded-0 w-50 custom-select-dropdown  mt-4 "
                                        aria-label="Select an Option" id="dropdown" name="pdistrict">
                                        <option value="0">--SELECT DISTRICT--</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->distname }}</option>
                                        @endforeach
                                        {{-- <option value="AD">ALIPURDUAR</option>
                                        <option value="BN">BANKURA</option>
                                        <option value="KB">COOCHBEHAR</option>
                                        <option value="DA">DARJEELING</option>
                                        <option value="DD">DINAJPUR DAKSHIN</option>
                                        <option value="UD">DINAJPUR UTTAR</option>
                                        <option value="HG">HOOGHLY</option>
                                        <option value="HR">HOWRAH</option>
                                        <option value="JP">JALPAIGURI</option>
                                        <option value="JH">JHARGRAM</option>
                                        <option value="KA">KALIMPONG</option>
                                        <option value="KO">KOLKATA</option>
                                        <option value="MA">MALDAH</option>
                                        <option value="KB">MEDINIPUR EAST</option>
                                        <option value="KB">MEDINIPUR WEST</option>
                                        <option value="KB">MURSHIDABAD</option>
                                        <option value="KB">NADIA</option>
                                        <option value="KB">PASCHIM BARDHAMAN</option>
                                        <option value="BR">PURBA BARDHAMAN</option>
                                        <option value="PU">PURULIA</option>
                                        <option value="PN">24 PARAGANAS NORTH</option>
                                        <option value="PS">24 PARAGANAS SOUTH</option> --}}

                                    </select>
                                </div>
                                <button class="btn btn-primary" type="button"
                                    onclick="stepper1.previous()">Previous</button>
                                <button class="btn btn-primary" type="button" onclick="stepper1.next()">Next</button>

                            </div>
                            <div id="test-l-3" class="content">
                                {{-- <p class="text-center">test 3</p> --}}
                                <div class="form-group d-flex align-items-center ">
                                    <label for="dropdown" class=" case-margin  mt-4"><strong>Department
                                            Name:</strong></label>
                                    <select class="form-select rounded-0 w-50 custom-select-dropdown  mt-4 "
                                        aria-label="Select an Option" name='rdept' id="dropdown">
                                        <option value="0">--SELECT TYPE OF DEPARTMENT--</option>
                                        <option value="GST">GST</option>
                                        {{-- <option value="d2">DEPARTMENT-2</option>
                                        <option value="d3">DEPARTMENT-3</option> --}}
                                    </select>
                                </div>
                                <div class="form-group d-flex align-items-center ">

                                    <label for="" class=' mt-3 rsn-dgn'><strong>Designation Name:</strong></label>
                                    <input type="text" class="form-control rounded-0 w-50 mt-3 input-margin"
                                        name="rdesig" placeholder="Enter Designation Name." />

                                </div>
                                <button class="btn btn-primary" type="button"
                                    onclick="stepper1.previous()">Previous</button>
                                <button class="btn btn-primary" type="button" onclick="stepper1.next()">Next</button>
                            </div>
                            <div id="test-l-4" class="content">
                                {{-- <p class="text-center">test 4</p> --}}
                                <div class="form-group d-flex align-items-center ">
                                    <label for="dropdown" class=" case-margin  mt-4"><strong>Advocate
                                            Name:</strong></label>
                                    <select class="form-select rounded-0 w-50 custom-select-dropdown  mt-4 "
                                        aria-label="Select an Option" name='advocname' id="dropdown">
                                        <option value="0">--SELECT ADVOCATE--</option>
                                        <option value="RAM JETHMALANI">RAM JETHMALANI</option>
                                        <option value="FALI S NARIMAN">FALI S NARIMAN</option>
                                        <option value="ASHOK DESAI
                                        ">ASHOK DESAI
                                        </option>
                                    </select>
                                </div>
                                {{-- <button class="btn btn-primary" onclick="stepper1.next()">Next</button> --}}
                                <div class="text-center">
                                    <button class="btn btn-primary" type="button"
                                        onclick="stepper1.previous()">Previous</button>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                </div>
            </div>
        </div>
    </div>
@endsection
