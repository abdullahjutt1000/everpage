<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Everpage {{ session('draft') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>
    {{-- Navbar start --}}
    <div class="navbar fixed-top nav1">
        <div class="container" id="emain">
            <img src="{{ asset('assets/img/slogo.png') }}" alt="" id="ebio">
            <div class="nav-right">
                <a href="{{ route('bio') }}" class="exit-button">
                    <button class="btn btn-link" id="ebtn">Cancel</button> </a>

                <button type="submit" id="u-draft" class="btn btn-link" data-toggle="modal"
                    data-target="#exampleModalCenter">Save
                    as draft</button>

                <button type="submit" id="p-button" name="publish" class="btn btn-secondary" disabled>Publish</button>
            </div>

        </div>
    </div>
    {{-- Navbar end --}}

    {{-- left sidebar start --}}
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-5">
                <p class="write-bio-title">Edit your bio</p>

                <div class="list-item">
                    <p> Answer the questions below to generate a whole new bio or edit what you have already.</p>
                </div>
                <hr>
                {{-- Question box section start  --}}
                <div class="question">

                    {{-- <p>where are you from?</p>
                    <textarea id="first" class="answer-input form-control"
                        placeholder="Where did you grow up? If you moved around, feel free to add many places."></textarea>
                    <button type="submit" id="save" class="btn btn-primary next-button">Next Question</button> --}}

                </div>
                {{-- Question box section end  --}}
                <hr>
                <div class="col-md-12 generate-bio">
                    <button type="submit" id="generate" class="btn btn-secondary generate-btn"
                        disabled="disabled">Generate new
                        bio</button>
                </div>

            </div>
            {{-- left sidebar end --}}


            {{-- Right side bar start  --}}

            <div class="col-md-7 fixed-right right-bar">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- Edit and update section start  --}}

                        <div class="col-md-3">
                            <img id="selected-image" src="{{ asset('uploads') . '/' . $recentRecord->image }}"
                                alt="" class="profile-img">

                            <label for="images" class="change-img">
                                <span id="change">Change</span>
                                <a href=""><input type="file" name="update-img" id="file-upload"></a>
                            </label>
                            <input type="hidden" name="original-image" value="{{ $recentRecord['image'] }}">

                        </div>

                        <div class="col-md-9 right-input">
                            <input type="text" class="form-control profile-input name" name="name"
                                value="{{ $recentRecord['name'] }}">
                            <input type="text" name="description" id="description"
                                value="{{ $recentRecord->description }}" class="form-control profile-input2">
                        </div>
                    </div>
                    <a href="" id="draft" hidden>Save as draft</a>
                    <button type="submit" id="publish" class="btn btn-primary" hidden>Publish</button>
                </form>

                {{-- Edit and update section end  --}}


                <div class="col-md-12 ">
                    <textarea name="" id="first" class="form-control bio-textarea1 u-bio" placeholder="">{{ $biorecord->biodata }}</textarea>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- load animation start  --}}
    <div class="load-main">
        <img src="{{ asset('assets/img/bioLoadar1.gif') }}" alt="">
        <div class="bio">Generating your bio.</div>
        <div class="minute">This may take a minute or two.</div>
    </div>
    {{-- load animation end  --}}





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

        $('body').on('input', '.name, #description, .u-bio', function() {
            $('#p-button').prop('disabled', false).css({
                'background': '#4597F7',
                'color': 'white',
                'cursor': 'pointer',
                'border': 'none',
                'padding': '9 px 25 px 9 px 25 px'
            });
            $('#u-draft').css({
                'color': '#212400'
            });
        });
        $('#p-button').on('click', function(event) {
            event.preventDefault();
            $('form').attr('action',
                ' {{ route('uptodate.profile', ['id' => session('signin'), session('draft')]) }}');



            $('form').submit();
        });
        $('#u-draft').on('click', function(event) {
            event.preventDefault();
            $('form').attr('action',
                ' {{ route('duptodate.profile', ['id' => session('signin'), session('draft')]) }}');

            $('form').submit();
        });


        // All Questions display on next button clicked section start 

        var questionIndex = 0;
        var $questionContainer = $('.question');
        var totalQuestions = 0;

        // Function to show the current question
        function showQuestion(index) {
            $questionContainer.find('.question-item').eq(index).show();
        }
        // Function to handle the "Next Question" button click
        function nextQuestion() {
            $(this).hide();
            questionIndex++;
            if (questionIndex < totalQuestions) {
                showQuestion(questionIndex);

            } else {
                showQuestion(questionIndex);
            }
        }

        // Handle next button show and hide and also generate bio 
        $('body').on('input', '.answer-input', function() {
            if ($(this).val().length > 0) {
                $(this).siblings('.next-button').show();

                if (questionIndex === totalQuestions - 1) {
                    // Hide the "Next Question" button if it's the last question
                    $('.next-button').hide();
                    $('.generate-btn').prop('disabled', false).show().css({
                        'background-color': '#4597f7',
                        'color': 'white',
                        'cursor': 'pointer',
                        'border': 'none',
                        'margin-right': '8px',
                        'margin-left': '28px',
                        'padding': '11px 22px'
                    });
                    $('.generate-btn').click(function() {

                        // load animation jquery section start
                        $('.load-main').css('visibility', 'visible');
                        $('body').css('overflow', 'hidden');
                        $('.nav1').hide();
                        var gifDuration = 12000;
                        setTimeout(function() {
                            $('.load-main').css('visibility', 'hidden');
                            $('.nav1').show();
                            $('body').css('overflow', 'visible');

                        }, gifDuration);
                        // load animation jquery section end

                        $(this).text('Regenerate');
                        $(this).css({
                            'background-color': '#e4e6ea',
                            'color': 'black'
                        });
                        $('#p-button').prop('disabled', false).css({
                            'background': '#4597F7',
                            'color': 'white',
                            'cursor': 'pointer',
                            'border': 'none',
                            'padding': '9 px 25 px 9 px 25 px'
                        });
                        $('#u-draft').css({
                            'color': '#212400'
                        });
                        $('#p-button').on('click', function(event) {
                            event.preventDefault();
                            console.log('form button clcked');
                            $('form').submit();
                        });
                        $('#u-draft').on('click', function(event) {
                            event.preventDefault();
                            $('form').submit();
                        });
                    })
                }
            } else {
                $(this).siblings('.next-button').hide();
            }
        });

        $.ajax({
            url: '{{ route('get.data') }}',
            type: 'GET',
            success: function(response) {
                console.log(response);
                var questions = response.map(function(obj) {
                    return obj.questions;
                });
                // Clear existing content
                $questionContainer.empty();

                totalQuestions = questions.length;
                // Append <p> tags and <textarea> for each question
                questions.forEach(function(question, index) {
                    var questionHTML = '<p>' + question + '</p>' +
                        '<textarea class="answer-input form-control" placeholder="Your answer"></textarea>' +
                        '<button type="submit" class="btn btn-primary next-button">Next Question</button>';
                    var $questionItem = $('<div class="question-item">' + questionHTML +
                        '</div>');
                    $questionContainer.append($questionItem);
                });

                // Hide all questions except the first one
                $questionContainer.find('.question-item:gt(0)').hide();
                // Add click event handler for the "Next Question" buttons
                $questionContainer.on('click', '.next-button', nextQuestion);
            },
            error: function(xhr, status, error) {
                // Handle the error
                console.error(error);
            }
        });

        // Right side jquery working start
        $(document).ready(function() {
            $("#file-upload").change(function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#selected-image").attr("src", e.target.result);
                    $("#selected-image").show();
                };
                reader.readAsDataURL(file);
            });

            $("#file-upload").change(function() {
                $('#p-button').prop('disabled', false).css({
                    'background': '#4597F7',
                    'color': 'white',
                    'cursor': 'pointer',
                    'border': 'none',
                    'padding': '9 px 25 px 9 px 25 px'
                });
                $('#u-draft').css({
                    'color': '#212400'
                });
            });

        });
        // Right side jquery working end 

    });
</script>

<!-- js Included -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
