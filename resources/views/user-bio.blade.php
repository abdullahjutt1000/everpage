<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>public page | Everpage</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>
    @if (session('signin'))
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
                                    class="home-input">
                                <img src="{{ asset('assets/img/cross.png') }}" alt="" id="cross"
                                    style="display: none">
                            </div>
                        </form>
                    </div>
                </div>

                <a href="" class="p-img" id="openmodal"><img src="{{ asset('uploads') . '/' . $data->image }}"
                        alt=""></a>
            </div>
        </div>

        <hr>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('vpublic') }}">View your public page</a>
            <a class="dropdown-item" href="{{ route('bio') }}">Edit your page</a>
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
                        <a href="{{ url('spirit') }}">
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

        <div class="container-fluid bgr-status">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 nav-item">
                        <h3 class="nav-heading">
                            By
                            <img src="{{ asset('assets/img/ever.png') }}" alt="" width="25" height="25"
                                class="new-logo">
                            Everpage
                            <img src="{{ asset('assets/img/verfied.png') }}" alt="" class="new-logo2">
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- image modal  --}}

        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <img src="{{ asset('assets/img/cut.png') }}" alt="" id="cut">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <img src="{{ asset('uploads/' . $data->image) }}" alt="" id="zoom">
            </div>
        </div>

        {{-- body start  --}}

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="bio-main d-flex">
                        <div class="left-side">
                            <span><img src="{{ asset('uploads/' . $data->image) }}" alt="" width="130px"
                                    height="130px" class="main-img"></span>
                            <div class="left-sub">
                                <span class="bio-name"> {{ $data->name }}</span>
                                <p>{{ $data->date_of_birth }}</p>
                                <a href=""><button class="btn btn-secondary like-btn"><img
                                            src="{{ asset('assets/img/add.png') }}" alt=""> Add
                                        as Kindered
                                        spirit</button></a>
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
                            dismantling the oppressive system of apartheid and fostering racial reconciliation in his
                            country. Serving as the first black president of South Africa, he led a broad coalition
                            government that promulgated a new constitution and established the Truth and Reconciliation
                            Commission to investigate past human rights abuses. Internationally, Mandela acted as a
                            mediator
                            in various conflicts and focused on combating poverty and HIV/AIDS through his charitable
                            foundation.

                            Ultimately, Mandela's legacy as an icon of democracy and social justice has inspired
                            countless
                            individuals worldwide to fight for equality and human rights, earning him deep respect and
                            admiration as the "Father of the Nation" in South Africa and beyond.</p>


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
    @elseif(session('draft'))
        {{-- <a class="dropdown-item" href="">View your public page</a> --}}
        <script>
            alert("Page not Found");
            window.location.href = "{{ route('home') }}";
        </script>
    @else
    @endif



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

    });
</script>

</html>
