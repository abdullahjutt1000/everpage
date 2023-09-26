<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Everpage
    </title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>
    <div class="div" hidden>{{ session('draft') }} {{ session('edit') }} {{ session('signin') }}</div>
    <div class="container">
        <div class="navbar">
            <div class="nav-sub">
                <div class="mains">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/img/slogo.png') }}" alt=""></a>
                </div>

                <div>
                    <form action="{{ url('search') }}" id="searchForm" enctype="multipart/form-data" method="GET">
                        <div class="home-search">
                            <button type="submit" id="search-btn"><img src="{{ asset('assets/img/searchl.png') }}"
                                    alt=""></button>
                            <input type="text" placeholder="Search for someone" name="query" id="searchInput"
                                class="home-input" autocomplete="off">
                            <img src="{{ asset('assets/img/cross.png') }}" alt="" id="cross"
                                style="display: none">
                        </div>
                    </form>
                </div>
            </div>

            <a href="" class="p-img" id="openmodal"><img src="{{ asset('uploads') . '/' . $alldata->image }}"
                    alt=""></a>
        </div>
    </div>
    <hr>

    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('vpublic') }}">View your public
            page</a>
        <a class="dropdown-item" href="{{ route('bio') }}">Edit your page
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ url('logout') }}">Sign out</a>
    </div>


    <div class="container-fluid outer-nav">
        <div class=" container navbar2">
            <div class="nav2-left">
                <div class="nav2">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/home.png') }}" alt="" id="img1">
                        <h3>Home</h3>
                    </a>
                    <a href="{{ url('spirit') }} ">
                        <img src="{{ asset('assets/img/user.png') }}" alt="" id="img2">
                        <h3>My kindred spirits</h3>
                    </a>
                    <a href="{{ route('bio') }}">
                        <img src="{{ asset('assets/img/pen.png') }}" alt="" id="img3">
                        <h3>My bio</h3>
                    </a>

                </div>
            </div>
            <div class="nav1-right">
                <a href="">
                    <img src="{{ asset('assets/img/share.png') }}" alt="">
                    Share your bio
                </a>
            </div>
        </div>
    </div>

    @if (session('draft'))
        <div class="container-fluid bg-status" id="nav-draft">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 nav-item">
                        <p>Your bio isn't published yet</p>
                        <a href="{{ route('replace') }}"><button class="btn btn-primary"
                                id="publish-draft">Publish</button></a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 profile2">
                <h1>Find a kindred spirit</h1>
                <h2>Suggested for you</h2>

                <div class="row main-home">
                    @foreach ($members as $member)
                        <div class="col-md-6 col-lg-4 col-sm-8 top-box">
                            <div class="main-box">
                                <div class="sub-box">
                                    <img src="{{ asset('uploads/' . $member->image) }}" alt="{{ $member->name }}"
                                        onclick="window.location.href='{{ route('user.link', ['link' => $member->link]) }}';">
                                </div>
                                <h3>{{ $member->name }}</h3>
                                <p>By Everpage <img src="{{ asset('assets/img/verfied.png') }}" alt=""></p>
                                <button class="btn btn-primary"
                                    onclick="window.location.href='{{ route('user.link', ['link' => $member->link]) }}'">
                                    See kindred score
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
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


        $("#searchInput").on("keyup", function() {
            if ($(this).val() === "") {
                $("#cross").hide();
            } else {
                $("#cross").show();
            }
        });

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




        // $("#publish-draft").click(function(event) {
        //     event.preventDefault();
        //     // Forget the 'draft' session
        //     // $.get("{{ url('replace-session') }}", function(data) {
        //     //     console.log(data);
        //     // });
        //     @php
            //         session()->forget('draft');
            //         session()->put('signin', session('signin'));
            //         // console . log(session('signin'));
            //
            //
        @endphp
        //     $("#nav-draft").hide();
        // });
    });
</script>

</html>
