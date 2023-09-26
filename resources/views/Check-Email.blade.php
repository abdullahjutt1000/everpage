{{-- <h1>signup with email</h1> --}}
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
    {{-- Signup email modal start  --}}

    <div class="modal fade n-modal" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                    @if ($data)
                        <p>Click the link we sent to ({{ $data }}) to sign in </p>
                    @else
                        <p>No email addresses found.</p>
                    @endif
                </div>
                <div class="continue-btn text-center">
                    <a href="{{ url('/') }}"><button class="btn btn-primary c-btn" type="submit">ok</button></a>
                </div>
                <br>
                <br>

            </div>
        </div>
    </div>

    {{-- Signup email modal end  --}}


    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Optional JavaScript -->
    <!-- Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {


            $(window).on('load', function() {
                $('#exampleModalCenter').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        });
    </script>


</html>
