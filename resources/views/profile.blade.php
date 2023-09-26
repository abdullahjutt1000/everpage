<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Ever.page/profile</title>
    <!-- <link rel="shortcut icon" href="'img/logo.png'" type="image/x-icon" /> -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>
    {{-- Navbar start --}}
    <div class="fixed-top nav1">
        <div class="nav-main">
            <div class="container d-flex justify-content-between">
                <a href="{{ url('/') }}"> <img src="{{ asset('assets/img/slogo.png') }}" alt=""
                        style="height: 25px; width:49px"></a>
                <div class="d-flex align-items-center">
                    <a href="{{ url('/') }}" id="e-btn">Exit</a>
                    {{-- <button class="btn btn-link" type="button" id="draft" data-toggle="modal"
                        data-target="#save-draft">Save as
                        draft</button> --}}
                    <button class="btn btn-link" type="button" id="draft">Save as
                        draft</button>
                    <button type="button" id="publish" class="btn btn-primary publish-btn">Publish</button>
                </div>

            </div>
        </div>
    </div>
    {{-- Navbar end --}}

    {{-- left sidebar start --}}
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-5 col-sm-12">
                <p class="write-bio-title">Create a bio to find your Kindred Spirits</p>

                <div class="list-item">
                    <p> Answer the questions below to generate your bio</p>
                    <ul>
                        <li>Fast &amp; easy</li>
                        <li> Fully editable</li>
                        <li> Honest answers = better results</li>
                    </ul>
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
                        disabled="disabled">Generate my
                        bio</button>
                    <p id="skip">Skip, write from scratch</p>
                </div>

            </div>
            {{-- left sidebar end --}}


            {{-- Right side bar start  --}}

            <div class="col-md-7 col-sm-12 fixed-right right-bar">
                <form method="POST" enctype="multipart/form-data" id="first-form">
                    @csrf
                    <div class="row">
                        {{-- Edit and update section start  --}}

                        <div class="col-md-3">
                            <img id="selected-image" src="{{ asset('uploads') . '/' . $recentRecord['image'] }}"
                                alt="" class="profile-img">
                            <label for="images" class="change-img">
                                <span id="change">Change</span>
                                <a href=""><input type="file" name="update-img" id="file-upload"></a>
                            </label>
                            <input type="hidden" name="original-image" value="{{ $recentRecord->image }}">
                        </div>

                        <div class="col-md-9 right-input">
                            <input type="text" class="form-control profile-input" name="name"
                                value="{{ $recentRecord['name'] }}">
                            <input type="text" name="description"
                                placeholder="Write a few words to describe yourself."
                                class="form-control profile-input2" id="description">
                        </div>
                    </div>

                    {{-- <a href="" id="draft" hidden>Save as draft</a>
                    <button type="submit" id="publish" class="btn btn-primary" hidden>Publish</button> --}}
                </form>

                {{-- Edit and update section end  --}}


                <div class="col-md-12 ">
                    <textarea name="" id="first" class="form-control bio-textarea"
                        placeholder="Your bio will appear here after you answer the questions and click “Generate my bio”. Alternatively, you can"></textarea>
                    <div class="bio-link" id="scratch">write your bio from scratch.</div>

                    <div id="bio-container" style="display: none;">
                        <textarea name="" id="first" class="form-control bio-textarea" placeholder="Your bio will appear here">
                            @foreach ($biorecord as $bio)
{{ $bio->biodata }}
@endforeach
                        </textarea>

                        {{-- <textarea name="" id="write" class="form-control  hide-textarea" placeholder="Write your bio here"></textarea> --}}

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

    {{-- Signup email modal start with publish button  --}}

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                    <button class="btn btn-light s-google">
                        <span id="first-btn">
                            <img src="{{ asset('assets/img/inbox.png') }}" alt="">
                        </span>
                        Sign up with email
                    </button>
                    <p class="already-login">Already signed in with email <span class="click-here">Click here</span>
                    </p>

                </div>
                <p class="login-detail">
                    Click Continue or Sign up to agree to the Everpage <a href="">terms of service</a>
                    and <a href="">privacy policy .</a>
                </p>
            </div>
        </div>
    </div>

    {{-- Signup email modal end  --}}

    {{-- Signup modal for save as draft button start for publish --}}

    <div class="modal fade draft" id="save-draft" tabindex="-1" role="dialog"
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
                    <button class="btn btn-light s-google" id="second">
                        <span id="first-btn">
                            <img src="{{ asset('assets/img/inbox.png') }}" alt="">
                        </span>
                        Sign up with email
                    </button>
                    <p class="already-login">Already signed in with email <span class="click-here">Click here</span>
                    </p>

                </div>
                <p class="login-detail">
                    Click Continue or Sign up to agree to the Everpage <a href="">terms of service</a>
                    and <a href="">privacy policy .</a>
                </p>
            </div>
        </div>
    </div>
    {{-- Signup modal for save as draft button end for publish --}}

    {{-- Signup modal for save as draft button start for draft --}}

    <div class="modal fade draft" id="first_draft" tabindex="-1" role="dialog"
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
                    <button class="btn btn-light s-google" id="first_draft_btn">
                        <span id="first-btn">
                            <img src="{{ asset('assets/img/inbox.png') }}" alt="">
                        </span>
                        Sign up with email
                    </button>
                    <p class="already-login">Already signed in with email <span class="click-here">Click here</span>
                    </p>

                </div>
                <p class="login-detail">
                    Click Continue or Sign up to agree to the Everpage <a href="">terms of service</a>
                    and <a href="">privacy policy .</a>
                </p>
            </div>
        </div>
    </div>
    {{-- Signup modal for save as draft button end for draft --}}


    {{-- Signup modal for save as draft button start for publish  --}}
    <div class="modal fade n-modal w-email" id="with-email" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="Modal-header">
                    <button type="button" class="close">
                        <span aria-hidden="true" id="close">X</span>
                    </button>
                </div>
                <form method="POST" id="signin-email" enctype="multipart/form-data"
                    action="{{ route('dinsert-mail.id', ['id' => $recentRecord->id]) }}">
                    @csrf
                    <h5 class="modal-title" id="exampleModalLongTitle">Sign up with email</h5>
                    <div class="modal-body signup-body">
                        <label for="" class="p-email">Your personal email
                        </label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email') }}" required>

                        <span id="error" style="color: red"></span>

                    </div>
                    <div class="continue-btn text-center">
                        <button class="btn btn-primary c-btn" type="button" id="con-btn">Continue
                            <div class="spinner-border spinner-border-sm" role="status" id="spinner">
                                <span class="sr-only"></span>
                            </div>
                        </button>
                    </div>
                    <p class="login-details">
                        < All sign up options </p>
                </form>
            </div>
        </div>
    </div>
    {{-- Signup modal for save as draft button end for publish --}}

    {{-- Signup modal for save as draft button start for draft  --}}
    <div class="modal fade n-modal w-email" id="second_draft" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="Modal-header">
                    <button type="button" class="close">
                        <span aria-hidden="true" id="close">X</span>
                    </button>
                </div>
                <form method="POST" id="signin-draft" enctype="multipart/form-data"
                    action="{{ route('dinsert-mail.id', ['id' => $recentRecord->id]) }}">
                    @csrf
                    <h5 class="modal-title" id="exampleModalLongTitle">Sign up with email</h5>
                    <div class="modal-body signup-body">
                        <label for="" class="p-email">Your personal email
                        </label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email') }}" required>

                        <span id="Error" style="color: red"></span>

                    </div>
                    <div class="continue-btn text-center">
                        <button class="btn btn-primary c-btn" type="button" id="second_draft_btn">Continue</button>
                    </div>
                    <p class="login-details">
                        < All sign up options </p>
                </form>
            </div>
        </div>
    </div>
    {{-- Signup modal for save as draft button end for draft --}}


    {{-- check email modal start for publish --}}
    <div class="modal fade n-modal" id="Check-Email" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="Modal-header">
                    <button type="button" class="close">
                        <span aria-hidden="true" id="close">X</span>
                    </button>
                </div>


                <h5 class="modal-title" id="exampleModalLongTitle">Check your inbox</h5>
                <div class="modal-body signup-body">

                    <p>Click the link we sent to <span id="new_email"> </span> to complete your
                        account
                        creation</p>
                </div>
                <div class="continue-btn text-center">
                    <a href="{{ url('waiting') }}"><button class="btn btn-primary c-btn"
                            type="submit">ok</button></a>
                    {{-- <button class="btn btn-primary c-btn" type="submit" id="ok">ok</button> --}}
                </div>
                <br>
                <br>

            </div>
        </div>
    </div>
    {{-- check email modal end  --}}

    {{-- check email modal start for draft --}}
    <div class="modal fade n-modal" id="third_draft" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="Modal-header">
                    <button type="button" class="close">
                        <span aria-hidden="true" id="close">X</span>
                    </button>
                </div>


                <h5 class="modal-title" id="exampleModalLongTitle">Check your inbox</h5>
                <div class="modal-body signup-body">

                    <p>Click the link we sent to <span id="display_email"> </span> to complete your
                        account
                        creation</p>
                </div>
                <div class="continue-btn text-center">
                    <a href="{{ url('waiting') }}"><button class="btn btn-primary c-btn"
                            type="submit">ok</button></a>
                    {{-- <button class="btn btn-primary c-btn" type="submit" id="ok">ok</button> --}}
                </div>
                <br>
                <br>

            </div>
        </div>
    </div>
    {{-- check email modal end for model --}}



    {{ View::make('footer') }}




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

{{-- jquery for the display image section start --}}

<script>
    $(document).ready(function() {
        $('#draft').hide();
        $('#publish').hide();

        // $('#second').click(function() {
        //     $('#with-email').modal('show');
        //     // SigninEmailForm($('#signin-email'));
        //     $('#save-draft').modal('hide');

        // });
        $('.login-details').click(function() {
            console.log('all login clicked');
            $('#with-email').modal('hide');
            $('#save-draft').modal('show');
            $('#second_draft').modal('hide');

        });
        $('.close').click(function() {
            console.log('clicked on close button ');
            $('#with-email').modal('hide');
            $('#save-draft').modal('hide');
            $('#Check-Email').modal('hide');
            $("#first_draft").modal('hide');
            $('#second_draft').modal('hide');
            $('#third_draft').modal('hide');
        });
        $("#scratch").click(function() {

            $(".bio-textarea").prop("readonly", false);
            $(".bio-textarea").css({
                "pointer-events": "auto",
                "background": "#ffffff",
                "color": "#495057"
            });
            $("#first").attr("placeholder", "Write your bio here");
            $("#first").focus();
            $("#scratch").hide();
        });
        $('#publish').on('click', function(event) {
            event.preventDefault();
            submitPublishForm($('#first-form'));
            $("#save-draft").modal('show');
        });
        $('#second').click(function() {
            $('#save-draft').modal('hide');
            $('#with-email').modal('show');
            $("#spinner").hide();
        });
        $('#con-btn').click(function() {
            SigninEmailForm($('#signin-email'));
            $("#spinner").show();
        });

        // for draft button 

        $('#draft').on('click', function(event) {
            event.preventDefault();
            submitDraftForm($('#first-form'));
            $("#first_draft").modal('show');

        });
        $('#first_draft_btn').click(function() {
            $('#first_draft').modal('hide');
            $('#second_draft').modal('show');
            // $("#spinner").hide();
        });
        $('#second_draft_btn').click(function() {
            SigninEmailDraft($('#signin-email'));
            $("#spinner").show();
        });

        $('#first').on('input', function() {
            var inputValue = $(this).val().trim();

            if (inputValue.length > 0) {
                console.log("script writing");
                $('#draft').show();
                $('#publish').show();


            } else {
                $('#draft').hide();
                $('#publish').hide();
            }
        });

        $("#generate").click(function() {

            $("#first").hide();
            $("#bio-container").show();
            // var bioData = @json($biorecord[0]->biodata);
            // $("#first").val(bioData);
            $(".bio-textarea").css({
                "pointer-events": "auto",
                "background": "#ffffff",
                "color": "#495057"
            });
            $("#first").focus();
            $("#scratch").hide();
            $("#first").prop("readonly", false);
        });

        $('#skip').click(function() {
            $(".bio-textarea").prop("readonly", false);

            $(".bio-textarea").css({
                "pointer-events": "auto",
                "background": "#ffffff",
                "color": "#495057"
            });
            $("#first").attr("placeholder", "Write your bio here");
            $("#first").focus();
            $("#scratch").hide();
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
                        $('#draft').show();
                        $('#publish').show();
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

        });
        // Right side jquery working end 

        function submitDraftForm(form) {
            console.log('Submitting draft form');
            $.ajax({
                type: 'POST',
                url: '{{ route('draft.post', ['id' => $recentRecord->id]) }}',
                data: form.serialize(),

                success: function(response) {
                    console.log(response);


                },
                error: function(xhr, status, error) {

                }
            });
        }

        function submitPublishForm(form) {
            console.log('Submitting publish form');
            $.ajax({
                type: 'POST',
                url: '{{ route('signup.post', ['id' => $recentRecord->id]) }}',
                data: form.serialize(),

                success: function(response) {
                    console.log(response);


                },
                error: function(xhr, status, error) {

                }
            });
        }

        function SigninEmailForm(form) {
            console.log('continue with email');
            $.ajax({
                type: 'POST',
                url: '{{ route('dinsert-mail.id', ['id' => $recentRecord->id]) }}',
                data: $('#signin-email').serialize(),
                success: function(response) {
                    console.log(response);
                    if (!response.success) {

                        var errors = response.errors;
                        console.log(errors);
                        var email_email = errors?.email[0];
                        $("#spinner").hide();

                        $("#error").show();
                        $("#error").html(email_email);
                        $("#Error").html(email_email);
                    } else {
                        $("#error").hide();
                        $("#spinner").show();

                        $('#with-email').modal('hide');
                        var email = response.new_email;
                        $("#new_email").html(email);
                        $('#Check-Email').modal('show');


                    }


                },
                error: function(xhr) {
                    // Handle AJAX errors if any
                }
            });
        }

        function SigninEmailDraft(form) {
            console.log('continue with email');
            $.ajax({
                type: 'POST',
                url: '{{ route('dinsert-mail.id', ['id' => $recentRecord->id]) }}',
                data: $('#signin-draft').serialize(),
                success: function(response) {
                    // console.log(response);
                    if (!response.success) {

                        var errors = response.errors;
                        console.log(errors);
                        var email_email = errors?.email[0];
                        $("#spinner").hide();

                        $("#Error").show();
                        $("#Error").html(email_email);
                    } else {
                        $("#Error").hide();
                        $("#spinner").show();

                        $('#second_draft').modal('hide');
                        var email = response.new_email;
                        $("#display_email").html(email);
                        $('#third_draft').modal('show');
                    }


                },
                error: function(xhr) {
                    // Handle AJAX errors if any
                }
            });
        }




    });
</script>

</html>
