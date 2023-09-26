{{-- <h1>signup with email</h1> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ever.page/profile</title>
    <!-- <link rel="shortcut icon" href="'img/logo.png'" type="image/x-icon" /> -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>
    {{-- Signup email modal start  --}}

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" hidden>
        Launch demo modal
    </button>

    <div class="modal fade n-modal" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="Modal-header">
                    <button type="button" class="close">
                        <span aria-hidden="true" id="close">X</span>
                    </button>
                </div>
                <form action="/insert-mail" method="POST">
                    @csrf
                    <h5 class="modal-title" id="exampleModalLongTitle">Sign up with email</h5>
                    <div class="modal-body signup-body">
                        <label for="" class="p-email">Your personal email
                        </label>
                        <input type="email" name="email" class="form-control" id="email">
                        <span style="color: red">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="continue-btn text-center">
                        <button class="btn btn-primary c-btn" type="submit">Continue</button>
                    </div>
                    <p class="login-details">
                        < All sign up options </p>
                </form>
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
            // $('.s-google').click(function() {
            //     console.log("signup button clicked");
            //     $('.n-modal').modal('show');
            //     $('#exampleModalCenter').modal('hide');
            // });
            // $('.login-details').click(function() {
            //     $('#exampleModalCenter').modal('show');
            //     $('.n-modal').modal('hide');


            // })
        });
    </script>


</html>
