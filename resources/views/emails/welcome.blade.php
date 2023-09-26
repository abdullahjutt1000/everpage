@php
    use Illuminate\Support\Facades\Route;
@endphp

<img src="https://ci4.googleusercontent.com/proxy/KGm0vWFXH5K9xP00sGifoTeBDv34yAVe0Mc0w46Lqe_E0qleNXxgesmYOPHJDTcrHz0a=s0-d-e1-ft#https://ever.page/image/logo.png"
    style="margin-top:30px;width:199px" alt="">

<h1>You’re almost done.</h1>
<br>
<p>Click the link below to confirm your email and finish creating your Everpage
    account.</p>
<br>
<p>This link will expire in 2 hours and can only be used once.</p>
<br>

{{-- <a href="{{ route('complete.id', ['id' => $existingId]) }}"
    style="font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    text-align: center;
    color: #ffffff;
    border: none;
    background-color: #4597f7;
    border-radius: 5px;
    height: auto;
    padding: 9px 32px;
    display:inline-block;
    text-decoration: none;">
    Complete your account
</a> --}}

<a href="{{ url('complete') }}?_token={{ $csrfToken }}"
    style="font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    text-align: center;
    color: #ffffff;
    border: none;
    background-color: #4597f7;
    border-radius: 5px;
    height: auto;
    padding: 9px 32px;
    display:inline-block;
    text-decoration: none;">
    Complete your account
</a>
