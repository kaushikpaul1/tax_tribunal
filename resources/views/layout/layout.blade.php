<!doctype html>
<html lang="en">

<head>
    <title>Tax-Tribunal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registercase.css') }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/multiselect-dropdown.js') }}"></script>

    <style>
        .multiselect-dropdown {
            width: 100% !important;
        }

        .btn-xs {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .navbar-logo {
            max-width: 50px;
            /* Decreased size */
            height: auto;
        }

        .paragraph p {
            font-size: 1.25rem;
            /* Adjust for text size */
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .paragraph p {
                font-size: 1rem;
                /* Smaller text on mobile */
            }

            .navbar-logo {
                max-width: 30px;
                /* Smaller logo on mobile */
            }
        }
    </style>
</head>

<body>

    <!-- Header Start -->
    <header class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <!-- New content section -->
            <div class="d-flex align-items-center">
                <div>
                    <img src="{{ asset('images/WB.svg') }}" alt="West Bengal Logo" class="img-fluid navbar-logo me-3">
                </div>
                <div class="paragraph">
                    <p class="mt-2 mb-0 display-6 text-white">WEST BENGAL TAX TRIBUNAL<br>GOVERNMENT OF WEST BENGAL</p>
                </div>
            </div>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    {{-- <li class="nav-item ">
                        <a class="nav-link text-white" href="">Home</a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            {{-- <h1><a href="" class="logo">Admin Dashboard</a></h1> --}}
            @if (auth()->user()->role == 1)
                <h1><a href="" class="logo">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Welcome <br>&nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Admin</a></h1>
            @elseif (auth()->user()->role == 2)
                <h1><a href="" class="logo">&nbsp; &nbsp; &nbsp; &nbsp; Welcome <br>Court Authirity</a></h1>
            @elseif (auth()->user()->role == 3)
                <h1><a href="" class="logo">&nbsp; &nbsp; &nbsp; &nbsp; Welcome <br>Dealing Authirity</a></h1>
            @endif



            <ul class="list-unstyled components mb-5">

                @if (auth()->user()->role == 1)
                    {{-- <li>
                        <a href="{{ route('superAdminUsers') }}"><span class="fa fa-users mr-3"></span> Users</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('hearingdateadmin') }}"><span class="fa fa-users mr-3"></span> Hearing
                            Publish</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('manageRole') }}"><span class="fa fa-role mr-3"></span> Manage Role</a>
                    </li> --}}
                @elseif (auth()->user()->role == 2)
                    {{-- <li>
                        <a href="{{ route('superAdminUsers') }}"><span class="fa fa-users mr-3"></span> Users</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('dashboardCourt') }}"><span class="fa fa-home mr-3"></span> Home</a>
                    </li>
                    <li>
                        <a href="{{ route('causelistdate') }}"><span class="fa fa-list mr-3"></span> Cause List</a>
                    </li>
                    <li>
                        <a href="{{ route('hearingdate') }}"><span class="fa fa-gavel mr-3"></span> Hearing Entry</a>
                    </li>
                @elseif (auth()->user()->role == 3)
                    <li>
                        <a href="{{ route('dashboardDealing') }}"><span class="fa fa-home mr-3"></span> Home</a>
                    </li>
                    <li>
                        <a href="{{ route('registercase') }}"><span class="fa fa-user-plus mr-3"></span> Register
                            Case</a>
                    </li>
                    <li>
                        <a href="{{ route('allcase') }}"><span class="fa fa-clock-o mr-3"></span> Pending Cases</a>
                    </li>
                    <li>
                        <a href="{{ route('approvedlist') }}"><span class="fa fa-check mr-3"></span> Approved Cases</a>
                    </li>
                    <li>
                        <a href="{{ route('rejectedlist') }}"><span class="fa fa-ban mr-3"></span> Rejected Cases</a>
                    </li>
                    <li>
                        <a href="{{ route('causelist') }}"><span class="fa fa-list mr-3"></span>Cause List</a>
                    </li>
                @endif

                <li>
                    <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            @yield('space-work')
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">

        <div class="text-center p-4 bg-dark text-white">
            &copy; 2024 Tax-Tribunal. All rights reserved.
        </div>
    </footer>
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

    <script>
        var stepper1Node = document.querySelector('#stepper1')
        var stepper1 = new Stepper(document.querySelector('#stepper1'))

        stepper1Node.addEventListener('show.bs-stepper', function(event) {
            console.warn('show.bs-stepper', event)
        })
        stepper1Node.addEventListener('shown.bs-stepper', function(event) {
            console.warn('shown.bs-stepper', event)
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable(); // Corrected the initialization here

        });
    </script>
    <!-- Add this section to yield additional scripts -->
    @yield('scripts')

</body>

</html>
