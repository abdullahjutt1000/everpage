<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting account verification | Everpage</title>
    <!-- <link rel="shortcut icon" href="'img/logo.png'" type="image/x-icon" /> -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>

    <div class="navbar container">
        <a href="{{ url('/') }}"><img src="{{ asset('assets/img/slogo.png') }}" alt="" height="25"
                width="49"></a>
        <a href="{{ url('logout') }}">
            <div class="logout-text">Logout</div>
        </a>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="title">Your account is awaiting verification</p>
                <br>
                <p class="description">A varification email has been sent to {{ $data->emails }}. <br>Click the link
                    in
                    the
                    email to complete your account creation.</p>
                {{-- <p class="description"></p> --}}


                <p class="description">Don't see the email? Try checking your junk mail folder or <a
                        href="">resend the email</a>.</p>

                <p class="description">Still having trouble? <a href="">Contact us</a></p>

                <br>
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
{{-- <script>
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
            $("#next").show();
        });

    });
</script> --}}

{{-- jquery for the display image section end --}}


<!-- js Included -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
