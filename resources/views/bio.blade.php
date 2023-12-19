<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My bio | Everpage </title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&display=swap" rel="stylesheet"> --}}


</head>

<body>


    <div class="container">
        <div class="navbar">
            <div class="nav-sub1">
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

            <a href="" class="p-img" id="openmodal"><img src="{{ asset('uploads') . '/' . $userRecord->image }}"
                    alt=""></a>
        </div>
    </div>

    {{-- image modal  --}}

    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <img src="{{ asset('assets/img/cut.png') }}" alt="" id="cut">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <img src="{{ asset('uploads/' . $userRecord->image) }}" alt="" id="zoom">
        </div>
    </div>

    <hr>

    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('vpublic') }}">View your public page</a>
        {{-- <a class="dropdown-item" href="{{ route('bio.id', ['id' => $userRecord->id]) }}">Edit your page</a> --}}
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



    @if (session('draft'))
        <div class="container-fluid bg-status">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 nav-item">
                        <p>Not published</p>
                        <a href="{{ route('replace') }}"><button class="btn btn-primary"
                                id="publish-draft">Publish</button></a>
                    </div>
                </div>
            </div>
        </div>
    @elseif(session('edit'))
        <div class="container-fluid bg-status">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 nav-item">
                        <p>latest version not published</p>
                        <a href="{{ route('replace') }}"><button class="btn btn-primary"
                                id="publish-draft">Publish</button></a>
                    </div>
                </div>
            </div>
        </div>
    @elseif(session('signin'))
        <div class="container-fluid bg-status">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 nav-item">
                        <p id="publish-date">Last published {{ date('F j, Y', strtotime(session('abc'))) }}</p>
                        <a href=""><button class="btn btn-secondary" disabled>publish</button></a>
                    </div>
                </div>
            </div>
        </div>
    @else
    @endif

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




    {{-- body start  --}}

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="bio-main d-flex">
                    <div class="left-side">
                        <span><img src="{{ asset('uploads') . '/' . $userRecord->image }}" alt=""
                                width="130px" height="130px" id="bio-img"></span>
                        <div class="left-sub">
                            <span class="bio-name"> {{ $userRecord->name }}</span>
                            <span><a href="" class="verify">verify</a></span>
                            <p>{{ $userRecord->description }}</p>

                        </div>
                    </div>
                    <div class="right-side">
                        <a href="{{ route('eprofile') }}"><img src="{{ asset('assets/img/pencil.png') }}"
                                alt=""></a>
                    </div>
                </div>
                <p class="detail">
                    {{ $record->biodata }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8">
                @foreach ($sectiondata as $section)
                    <div class="main-section" style="display: flex; justify-content:space-between">
                        <h3>{{ $section->title }}</h3>
                        <div class="sub-section">
                            <img src="{{ asset('assets/img/lists.png') }}" alt="">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('assets/img/section.png') }}" alt="">
                        </div>
                    </div>

                    <div class="text" style="margin-top: 15px">{{ $section->description }} </div>
                @endforeach
            </div>
        </div>
        <button class="btn btn-secondary add-section" id="add">+ Add section</button>

    </div>




    {{-- Add section Model start  --}}

    <div id="AddSection" style="display: none">
        <div id="AddSection-main">
            <img src="{{ asset('assets/img/cutmodel.png') }}" alt="" id="cross-icon">
            <div id="AddSection-sub">
                <div class="add-section-text">
                    Add a section
                </div>

                <div class="form-group">
                    <select class="form-control list">
                        <option>Select</option>
                        @foreach ($alldata as $item)
                            <option value="{{ $item->section }}" id="selected-section">
                                {{ $item->section }}
                            </option>
                        @endforeach
                    </select>
                    <p class="section-text">Sections make your page more personalized</p>
                </div>
                {{-- Text Section start --}}
                <div class="other-section-main" style="display: none">
                    <form action="{{ route('sectiontext') }}" method="POST" id="TextSection">
                        @csrf
                        <div class="title-section1">
                            <label for="" class="section-title">Section title</label>
                            <input type="text" name="text-input" id="text-input" class="form-control abc"
                                value="">
                        </div>
                        <div class="text-section">
                            <div class="section-content">
                                <label for="" class="section-title">Section content</label>
                            </div>
                            <div class="editor-main">
                                <div class="tolbar d-flex">
                                    <div class="unorder-link">
                                        <img src="{{ asset('assets/img/list.png') }}" alt="">
                                    </div>
                                    <div class="create-link">
                                        <img src="{{ asset('assets/img/link.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="editor" contenteditable="true" name="description">

                                </div>
                            </div>
                            <div class="text-typing">
                                <span id="current">0</span>
                                <span id="maximum">/ 1500</span>
                            </div>

                            {{-- <div class="text-button">
                                <div class="section-btn-main d-flex" style="display: none">
                                    <button class=" btn-main" id="other-cancel">Cancel</button>
                                    <button class="btn btn-light" type="submit" disabled
                                        id="other-save">Save</button>
                                </div>
                            </div> --}}
                        </div>

                        <div class="text-button">
                            <div class="section-btn-main d-flex" style="display: none">
                                <button class=" btn-main" id="other-cancel">Cancel</button>
                                <input type="hidden" name="description" id="description-input" value="">
                                <button class="btn btn-light" type="submit" disabled id="other-save">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
                {{-- Text Section end --}}


                {{-- image section start  --}}

                <div class="image-section-top" style="display: none">
                    <form action="{{ route('sectionimage') }}" enctype="multipart/form-data" method="POST"
                        id="ImageSection">
                        @csrf
                        <div class="title-section1">
                            <label for="" class="section-title">Section title</label>
                            <input type="text" name="image-input" id="image-input" class="form-control abc"
                                value="">
                        </div>

                        <div class="image-section-main">
                            <div class="image-section">
                                <div class="image-section-sub">
                                    <img src="{{ asset('assets/img/warning.png') }}" alt="">
                                    Add up to 4 photos
                                </div>
                            </div>
                            <div class="image-box">
                                {{-- <div class="row"> --}}
                                <div class=" row top-main-img">
                                    {{-- <div class="main-img"> --}}
                                    {{-- <img src="" alt="" id="imagePreview"> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="cross-icon-delete-img">
                                        x
                                    </div>
                                    <div class="add-caption">+ Caption</div> --}}
                                </div>
                                {{-- </div> --}}


                                {{-- select picture --}}

                                <div class="select-img">

                                    <label for="fileInput" class="select-img-sub">Select photos</label>
                                    <p class="img-type">JPG,PNG,GIF</p>
                                    <input type="file" name="img[]" id="fileInput" style="display: none"
                                        multiple>
                                </div>

                                <div class="section-btn-main d-flex">
                                    <button class=" btn-main" id="addsection-cancel">Cancel</button>
                                    <button class=" btn-main" id="save-btn" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- image section end  --}}

            </div>
        </div>
        <div class="oye"></div>
    </div>

    {{-- Add section Model end  --}}


    {{-- Add Caption Model start  --}}

    <div class="addcaptionModel" style="display: none">
        <div class="addcaptionModel-main">
            <div class="addcaptionModel-sub">
                <form action="{{ route('sectionimage') }}" method="POST">
                    @csrf
                    <div class="caption-img">
                        <img src="{{ asset('assets/img/abc.jpg') }}" alt="">
                    </div>

                    <div class="caption-text">
                        <textarea name="caption" id="" class="form-control" placeholder="Write caption"></textarea>
                    </div>


                    <div class="caption-btn-main d-flex">
                        <button class="btn btn-light" id="caption-cancel">Cancel</button>
                        <button class="btn btn-light" id="caption-save" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="oye"></div>
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

        $('#bio-img').click(function(e) {
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
                            var $img = $('<img>').attr('src', imageUrl).attr('alt',
                                '');
                            $recordContainer.append($name, $img);
                            $("#dropdown-sub").append($recordContainer);

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

        // Add section start 


        $("#add").click(function(e) {
            e.preventDefault();
            $("#AddSection").show();
            $('.image-section-top').hide();
            $('.other-section-main').hide();
        });
        $("#cross-icon,#addsection-cancel,#other-cancel").click(function() {
            $("#AddSection").hide();
        });

        $(".add-caption").click(function() {
            $(".addcaptionModel").show();
            $("#AddSection").hide();
        });
        $("#caption-cancel, #caption-save").click(function(e) {
            e.preventDefault();
            $("#AddSection").show();
            $(".addcaptionModel").hide();
        });

        // portion for section change while slecet 

        $(".list").on('change', function() {
            var query = $(this).val();

            console.log("clicked on the selected");
            $.ajax({
                url: '{{ route('section') }}',
                type: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    console.log(response);
                    if (!response.success) {
                        var alldata = response.alldata;
                        $('.other-section-main').show();
                        $('#text-input').val(alldata);
                        $('.image-section-top').hide();
                    } else {
                        var data = response.data;
                        $('#image-input').val(data);
                        $('.image-section-top').show();
                        $('.other-section-main').hide();
                    }

                }
            });
        });

        // portion for controlling text in the section 

        $(".editor").on('input keypress', function() {
            var data = $(this).text();
            console.log(data);
            $("#current").text(data.length);
            if (data.length > 0) {

                $("#other-save").prop('disabled', false);
                $("#other-save").css({
                    'color': 'black',
                    'font-weight': '400',
                    'font-size': '15px'
                });
            } else {
                $("#other-save").prop('disabled', true);
                $("#other-save").css({
                    'color': '#888',
                    'font-weight': '300',
                    'font-size': '14px'
                });
            }
        });

        // portion for saving text-section data 

        $("#other-save").on('click', function(e) {
            e.preventDefault();
            console.log("save button clicked");
            var input = $("#text-input").val();
            var descriptionContent = $('.editor').html();

            // Set the content as the value of a hidden input field
            $('#description-input').val(descriptionContent);

            // Submit the form
            $('#TextSection').submit();
            console.log(input);
            console.log(descriptionContent);

        });

        // $("#save-btn").on('click', function(e)) {

        // }

        // portion for saving image-section data

        $("#fileInput").on('change', function() {
            console.log("clicked on the pic input");
            var files = this.files;
            var imageContainer = $(".top-main-img");
            console.log(files);


            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (imageContainer.find('.unique').length >= 4) {
                    alert('Sorry,you can have a maximum of 4 photos');
                    $(this).val('');
                    return;
                }

                var reader = new FileReader();

                reader.onload = function(e) {
                    var imageUrl = e.target.result;
                    var imageElement = `
                    <div class="unique col-md-4"> 
                    <img src="${imageUrl}" alt="" height="100%" width="100%" >

                    <div class="cross-icon-delete-img">
                                        x
                        </div>
                    <div class="add-caption">+ Caption</div>
                    </div>
               
                    `;
                    var $imageElement = $(
                        imageElement);

                    $imageElement.find('.cross-icon-delete-img').click(function() {
                        $imageElement.remove();

                    });
                    $imageElement.find('.add-caption').click(function() {
                        // Show the modal
                        $(".addcaptionModel").show();
                        // Optionally, hide the original content
                        $("#AddSection").hide();
                        var clickedImageSrc = imageUrl;
                        $(".caption-img img").attr("src", clickedImageSrc);
                    });

                    imageContainer.append($imageElement);
                };

                reader.readAsDataURL(file);
            }
        });

        $(".cross-icon-delete-img").on('click', function() {

            console.log("clicked on the cross button");
            $('.unique').hide();
        });

    });
</script>

</html>
