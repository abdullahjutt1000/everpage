<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit | Everpage</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>
    <div class="container">
        <div class="row navbar">
            <div class="col-lg-1">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/slogo.png') }}" alt=""></a>
            </div>
            <div class="col-lg-9 main-search">
                <div class="home-search">
                    <form action="{{ url('search') }}" id="searchForm" enctype="multipart/form-data" method="GET">
                        <button type="submit" id="search-btn" class="home-img"><img
                                src="{{ asset('assets/img/searchl.png') }}" alt=""></button>
                        <input type="search" placeholder="Search for someone" name="query" id="searchInput"
                            class="home-input">
                    </form>
                </div>
            </div>
            <div class="col-lg-1">
                {{-- fetch here image from database  --}}
                <a href="" class="p-img" id="openmodal"><img src="{{ asset('assets/img/lines.png') }}"
                        alt=""></a>
                {{-- <a href="{{ url('logout') }}"><button class="btn btn-danger">logout</button></a> --}}
            </div>
        </div>
    </div>
    <hr>

    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ url('create') }}">Create your page</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter" href="#">Sign In</a>

    </div>
    {{-- Sign in Modal --}}
    {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="Modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="close">X</span>
                    </button>
                </div>
                <h5 class="modal-title" id="exampleModalLongTitle">Sign up to continue</h5>
                <div class="modal-body">
                    <button class="btn btn-primary c-google">
                        <span id="first-btn">
                            <img src="{{ asset('assets/img/google.png') }}" alt="">
                        </span>
                        Continue with Google
                    </button>
                </div>
                <div class="modal-body">
                    <a href="/signup-email">
                        <button class="btn btn-light s-google">
                            <span id="first-btn">
                                <img src="{{ asset('assets/img/inbox.png') }}" alt="">
                            </span>
                            Sign in with email
                        </button>
                    </a>
                    </p>

                </div>
                <p class="login-detail">
                    Click Continue or Sign up to agree to the Everpage <a href="">terms of service</a>
                    and <a href="">privacy policy .</a>
                </p>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="Modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="close">X</span>
                    </button>
                </div>
                <h5 class="modal-title">Sign in</h5>
                <div class="modal-body">
                    <button class="btn btn-primary c-google">
                        <span id="first-btn">
                            <img src="{{ asset('assets/img/google.png') }}" alt="">
                        </span>
                        Continue with Google
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <a href="/signup-email" data-toggle="modal" data-target="#nestedModal"> --}}
                    <button class="btn btn-light s-google" data-toggle="modal" data-target="#nestedModal">
                        <span id="first-btn">
                            <img src="{{ asset('assets/img/inbox.png') }}" alt="">
                        </span>
                        Sign in with email
                    </button>
                    {{-- Another modal start  --}}
                    <div class="modal n-modal" id="nestedModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static"
                        data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="Modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" id="close">X</span>
                                    </button>
                                </div>
                                <form action="/insert-mail" method="POST">
                                    @csrf
                                    <h5 class="modal-title">Sign in with email</h5>
                                    <div class="modal-body signup-body">

                                        <p>Enter the email address associated with your account, and we’ll send
                                            a magic link to your inbox.
                                        </p>
                                        <label for="" class="personal-email">Your personal email
                                        </label>
                                        <input type="email" name="email" class="form-control" id="email">
                                        {{-- <span style="color: red">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span> --}}
                                    </div>
                                    <div class="continue-btn text-center">
                                        <button class="btn btn-primary c-btn" type="submit">Continue</button>
                                    </div>
                                    <p class="login-details" id="all-option">
                                        All
                                        option< </p>

                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- </a> --}}

                </div>
                <p class="login-detail">
                    Click Continue or Sign up to agree to the Everpage <a href="">terms of service</a>
                    and <a href="">privacy policy .</a>
                </p>
            </div>
        </div>
    </div>

    {{-- body start  --}}

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="bio-main d-flex">
                    @foreach ($results as $result)
                        <div class="left-side">
                            <span><img src="{{ asset('uploads') . '/' . $result->image }}" alt=""
                                    width="130px" height="130px"></span>
                            <div class="left-profile">
                                <span class="bio-name"> {{ $result->name }}</span>
                                {{-- <span><a href="" class="verify">verify</a></span> --}}
                                <p>{{ $result->description }}</p>
                                <button class="btn btn-secondary add-as"><img src="{{ asset('assets/img/add.png') }}"
                                        alt="">Add as kindred
                                    spirits</button>

                            </div>
                        </div>
                        <div class="right-side">
                            <a href=""><img src="{{ asset('assets/img/share.png') }}" alt=""></a>
                        </div>
                    @endforeach

                </div>

                <p class="detail">
                    {{ $record->biodata }}
                </p>
            </div>
        </div>

    </div>



    {{ View::make('footer') }}



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

{{-- jquery for the display image section start --}}
<script>
    $(document).ready(function() {
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#openmodal').length) {
                // Close the dropdown
                $('.dropdown-menu').removeClass('show');
            }
        });

        $('#openmodal').click(function(e) {
            e.preventDefault();
            $('.dropdown-menu').toggleClass('show');
        });
    });
</script>

</html>
