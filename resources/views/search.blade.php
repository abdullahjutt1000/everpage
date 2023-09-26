@extends('master')


@section('content')
    <div class="home">
        <img src="{{ asset('assets/img/homelogo.png') }}" alt="">
    </div>

    {{-- Search section start --}}
    <form id="searchForm" enctype="multipart/form-data" method="GET">
        @csrf
        <div class="search">
            <div id="search-sub">
                <button type="button" id="search-btn"><img src="{{ asset('assets/img/searchl.png') }}"
                        alt=""></button>
                <input type="text" autocomplete="off" placeholder="Search for someone" name="query" id="searchInput"
                    data-live-search="true">
                <div id="cross-main">
                    <img src="{{ asset('assets/img/cross.png') }}" alt="" class="cut" id="cross"
                        style="display: none">
                </div>
            </div>

        </div>
    </form>



    {{-- Search section end --}}

    {{-- Signup section start --}}
    <div class="signup">
        <span class="text">✨ Find a Kindred Spirit. </span>
        <span class="start"><a href="{{ url('create') }}">Get started ></a></span>
    </div>

    {{-- Signup section end --}}


    <div id="dropdown-main">
        <div id="dropdown-1">.</div>
        <div id="dropdown">
            <div id="dropdown-sub">
                <h3></h3>

                <img src="" alt="">
            </div>

        </div>
    </div>
@endsection

@if (isset($message))
    <script>
        alert('{{ $message }}');
    </script>
@endif
