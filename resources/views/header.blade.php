<div class="container">
    <div class="sign-in">
        <button class="btn btn-link" id="signin_btn">Sign in</button>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
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
    <div class="modal n-modal" id="nestedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                            Enter the email address associated with your account, and we’ll send a magic link to your
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

    {{-- Signup email modal start  --}}

    <div class="modal fade n-modal" id="alert" tabindex="-1" role="dialog"
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
                    <p>click the link we sent to <span id="display"></span> to sign in </p>
                </div>
                <div class="continue-btn text-center">
                    <a href="{{ url('/') }}"><button class="btn btn-primary c-btn" type="button">ok</button></a>
                </div>
                <br>
                <br>

            </div>
        </div>
    </div>

    {{-- Signup email modal end  --}}


</div>
