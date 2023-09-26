<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Everpage</title>
    <!-- <link rel="shortcut icon" href="'img/logo.png'" type="image/x-icon" /> -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>

    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

<script>
    $(document).ready(function() {

        $(window).on('load', function() {
            $('#exampleModalCenter').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#nestedModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#alert').modal({
                backdrop: 'static',
                keyboard: false
            });
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


        $('#all-option').click(function() {
            console.log('clicked on login detail');
            $('#nestedModal').modal('hide');
            $('#exampleModalCenter').modal('show');
        });
        $("#signin_btn").click(function() {
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


    });
</script>

</html>
