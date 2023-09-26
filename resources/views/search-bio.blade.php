<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ session('name') }} {{ session('sname') }}| Everpage</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>


    <div class="container">
        <div class="navbar">
            <div class="nav-sub">
                <div class="mains">
                    @if (session('signin'))
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/slogo.png') }}" alt=""></a>
                    @endif
                    @if (session('draft'))
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/slogo.png') }}" alt=""></a>
                    @endif
                    @if (session('sname'))
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/img/slogo.png') }}"
                                alt=""></a>
                    @endif
                </div>

                <div>
                    <form action="{{ url('search') }}" id="searchForm" enctype="multipart/form-data" method="GET">
                        <div class="home-search">
                            <button type="submit" id="search-btn"><img src="{{ asset('assets/img/searchl.png') }}"
                                    alt=""></button>
                            <input type="text" placeholder="Search for someone" name="query" id="searchInput"
                                class="home-input">
                            <img src="{{ asset('assets/img/cross.png') }}" alt="" id="cross"
                                style="display: none">
                        </div>
                    </form>
                </div>
            </div>

            @if (session('signin'))
                <a href="" class="p-img" id="openmodal"><img
                        src="{{ asset('uploads') . '/' . $alldata->image }}" alt=""></a>
            @endif

            @if (session('draft'))
                <a href="" class="p-img" id="openmodal"><img
                        src="{{ asset('uploads') . '/' . $alldata->image }}" alt=""></a>
            @endif

            @if (session('sname'))
                <a href="" class="p-img" id="openmodal"><img src="{{ asset('assets/img/lines.png') }}"
                        alt=""></a>
            @endif

        </div>
    </div>

    <hr>
    @if (session('signin'))
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('vpublic') }}">View your public
                page</a>
            <a class="dropdown-item" href="{{ route('bio') }}">Edit your page
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('logout') }}">Sign out</a>
        </div>
    @endif
    @if (session('sname'))
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('create') }}">Create your page</a>
            <hr>
            <a class="dropdown-item" id="signin">Sign in</a>
        </div>
    @endif

    {{-- signin portion  --}}

    <div class="container">

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
                        <button class="btn btn-light s-google" id="signin_email">
                            <span id="first-btn">
                                <img src="{{ asset('assets/img/inbox.png') }}" alt="">
                            </span>
                            Sign in with email
                        </button>
                    </div>
                    <p class="login-detail">
                        Click Continue or Sign up to agree to the Everpage <a href="">terms of service</a>
                        and <a href="">privacy policy .</a>
                    </p>
                </div>
            </div>
        </div>

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
                    <form method="POST" id="signin-form">

                        @csrf
                        <h5 class="modal-title">Sign in with email</h5>
                        <div class="modal-body signup-body">
                            <p>
                                Enter the email address associated with your account, and we’ll send a magic link to
                                your
                                inbox.
                            </p>
                            <label for="" class="personal-email">Your personal email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            <div id="email_error" style="color: red"></div>
                        </div>
                        <div class="continue-btn text-center">
                            <button class="btn btn-primary c-btn" id="c_btn" type="button">Continue
                                <div class="spinner-border spinner-border-sm" role="status" id="spinner">
                                    <span class="sr-only"></span>
                                </div>
                            </button>
                        </div>
                        <p class="login-details" id="all-option">
                            All option
                        </p>
                    </form>

                </div>
            </div>
        </div>

        {{-- Live search view start  --}}

        <div id="dropdown-main">
            <div id="dropdown-top">.</div>
            <div id="dropdown-bottom">
                <div id="dropdown-sub">
                    <h3></h3>

                    <img src="" alt="">
                </div>

            </div>
        </div>

        {{-- Live search view end  --}}


        {{-- Signup email modal start  --}}

        <div class="modal fade n-modal" id="alert" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static"
            data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="Modal-header">
                        <button type="button" class="close">
                            <span aria-hidden="true" id="close">X</span>
                        </button>
                    </div>
                    <h5 class="modal-title" id="exampleModalLongTitle">Check your inbox</h5>
                    <div class="modal-body signup-body">
                        <p>click the link we sent to <span id="display"></span> to sign in </p>
                    </div>
                    <div class="continue-btn text-center">
                        <a href="{{ url('/') }}"><button class="btn btn-primary c-btn"
                                type="button">ok</button></a>
                    </div>
                    <br>
                    <br>

                </div>
            </div>
        </div>

        {{-- Signup email modal end  --}}


    </div>
    {{-- body start  --}}

    {{-- image modal  --}}

    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <img src="{{ asset('assets/img/cut.png') }}" alt="" id="cut">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <img src="{{ asset('uploads/' . $data->image) }}" alt="" id="zoom">
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="bio-main d-flex">
                    <div class="left-side d-flex">
                        <div class="left-img">
                            <img src="{{ asset('uploads/' . $data->image) }}" alt="" width="130"
                                height="130" class="main-img">
                        </div>
                        <div id="left-write">
                            <span class="bio-name"> {{ $data->name }}</span>
                            <p>{{ $data->description }}</p>

                            <button class="btn btn-secondary like-btn like-button" type="button">
                                <img src="{{ asset('assets/img/add.png') }}" alt="">
                                Add as Kindered spirit
                            </button>
                            <div id="like-alert" class="alert alert-danger" style="display: none"></div>
                            <div id="like-alerts" class="alert alert-success" style="display: none"></div>


                        </div>
                    </div>
                    <div class="right-side">
                        <a href=""><img src="{{ asset('assets/img/share.png') }}" alt=""></a>
                    </div>
                </div>

                <div class="first-heading">
                    <h3>Impact</h3>
                    <p class="descript">Nelson Mandela's impact on humanity was profound and far-reaching.

                        As a South African anti-apartheid activist and politician, Mandela dedicated his life to
                        dismantling the oppressive system of apartheid and fostering racial reconciliation in
                        his
                        country. Serving as the first black president of South Africa, he led a broad coalition
                        government that promulgated a new constitution and established the Truth and
                        Reconciliation
                        Commission to investigate past human rights abuses. Internationally, Mandela acted as a
                        mediator
                        in various conflicts and focused on combating poverty and HIV/AIDS through his
                        charitable
                        foundation.

                        Ultimately, Mandela's legacy as an icon of democracy and social justice has inspired
                        countless
                        individuals worldwide to fight for equality and human rights, earning him deep respect
                        and
                        admiration as the "Father of the Nation" in South Africa and beyond.</p>
                </div>

            </div>
        </div>
    </div>





    {{ View::make('footer') }}



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

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
        // Function to handle the click event on the cross button
        $("#cross").on("click", function() {
            $("#searchInput").val("");
            $(this).hide();
        });

        // Function to handle the keyup event on the search input
        $("#searchInput").on("keyup", function() {
            if ($(this).val() === "") {
                $("#cross").hide();
            } else {
                $("#cross").show();
            }
        });
        $('.main-img').click(function(e) {
            console.log("clicked on the image");
            // e.stopPropagation();
            $('#imageModal').modal({
                backdrop: 'static',
                keyboard: false
            });

            $('#imageModal').modal('show');

        });
        $("#cut").click(function() {

            $('#imageModal').modal('hide');

        });

        $('#all-option').click(function() {
            console.log('clicked on login detail');
            $('#nestedModal').modal('hide');
            $('#exampleModalCenter').modal('show');
        });
        $("#signin").click(function() {
            console.log("clicked on the signin button");
            $('#exampleModalCenter').modal('show');
        });
        $("#signin_email").click(function(e) {
            e.preventDefault();
            $("#nestedModal").modal('show');
            $('#exampleModalCenter').modal('hide');
            $("#spinner").hide();

        });
        $("#c_btn").click(function() {
            // console.log('clicked on the continue button');//
            SigninEmailDraft($('#signin-form'));
            $("#spinner").show();
        });

        $(".close").click(function() {
            $('#exampleModalCenter').modal('hide');
            $("#nestedModal").modal('hide');
        });

        function SigninEmailDraft(form) {
            console.log('continue with email');
            $.ajax({
                type: 'POST',
                url: '{{ route('signin') }}',
                data: $('#signin-form').serialize(),
                success: function(response) {
                    console.log(response);
                    console.log(response.success);
                    if (!response.success) {

                        var errors = response.errors;
                        console.log(errors);
                        var email_email = errors?.email[0];
                        var email_error = response.message;
                        console.log(email_error);
                        $("#spinner").hide();

                        $("#email_error").show();
                        $("#email_error").html(email_email);
                        $("#email_error").html(email_error);
                    } else {

                        $("#email_error").hide();
                        $("#spinner").show();

                        $("#nestedModal").modal('hide');
                        var email = response.user_email;
                        $("#display").html(email);
                        $("#alert").modal('show');
                    }


                },
                error: function(xhr) {
                    // Handle AJAX errors if any
                }
            });
        }

        // Live search jquery code start

        var $searchInput = $('input[name="query"]');
        var $dropdown = $('#dropdown-sub');
        var $main = $('#dropdown-main');
        $dropdown.hide();
        $main.hide();
        $searchInput.on('keyup input', function() {
            var query = $(this).val().trim();
            if (query === '') {
                $dropdown.empty().hide();
                $main.hide();
                return;
            }

            $.ajax({
                url: '{{ route('search') }}',
                type: 'GET',
                data: {
                    'query': query
                },
                success: function(response) {
                    $dropdown.empty();
                    if (response.length > 0) {
                        $.each(response, function(index, item) {
                            var imageUrl = '{{ asset('uploads/') }}/' + item
                                .image;
                            console.log('Image URL:', imageUrl);

                            var $recordContainer = $('<div>').addClass(
                                'record-container');
                            $recordContainer.data('id', item.link);

                            $recordContainer.click(function() {
                                // Retrieve the 'id' from the data attribute
                                var link = $(this).data('id');
                                console.log(link);


                                window.location.href = '/' + link;



                            });
                            var $name = $('<h3>').text(item.name);
                            var $img = $('<img>').attr('src', imageUrl)
                                .attr('alt',
                                    '');

                            $recordContainer.append($name, $img);
                            $(
                                "#dropdown-sub").append($recordContainer);

                        });
                        $dropdown.show();
                        $main.show();


                    } else {
                        var $noResults = $('<h3>').text(
                            'Person not found');
                        $dropdown.append($noResults);

                        // Show the dropdown with "No results found" message
                        $dropdown.show();
                        $main.show();
                    }
                }
            });
        });


        // Hide the dropdown when clicking outside of it
        $(document).on('click', function(event) {
            if (!$dropdown.is(event.target) && $dropdown.has(event.target).length === 0) {
                $dropdown.empty().hide();
                $main.hide();
            }
        });

        // Handle click on "X" button to clear input
        $('.cut').click(function() {
            $searchInput.val('');
            $dropdown.empty().hide();
            $main.hide();
        });
        // Live search jquery code end

        // like kindered code start 

        $(".like-button").click(function() {
            console.log("clicked on the like button ");
            var button = $(this);
            $.ajax({
                type: 'GET',
                url: '{{ route('like.user', ['name' => $data->link]) }}',
                success: function(response) {
                    console.log(response);
                    if (!response.success) {
                        var errors = response.message;
                        console.log(errors);
                        $("#like-alert").show();
                        $("#like-alert").html(errors);
                        setTimeout(function() {
                            $("#like-alert").hide();
                        }, 3000);
                    } else {
                        var success = response.message;
                        $("#like-alerts").show();
                        $("#like-alerts").html(success);
                        setTimeout(function() {
                            $("#like-alerts").hide();
                        }, 3000);
                    }
                }
            });
        });



    });
</script>

</html>
