<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Account | Everpage</title>
    <!-- <link rel="shortcut icon" href="'img/logo.png'" type="image/x-icon" /> -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Noto+Sans+Georgian:wght@300&family=Noto+Serif+Georgian:wght@200&family=Rowdies:wght@700&display=swap"
        rel="stylesheet">


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
        <form action="" method="POST" id="link-form">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <p class="title">Complete your account</p>
                    <p class="description">where would you like your page to live?</p>
                    <div class="c-main">
                        <p class="lable">ever.page/</p>
                        <div id="address-unavailable" style="display: none; color:red">
                        </div>
                        <img src="{{ asset('assets/img/tik.png') }}" alt="" id="tik"
                            style="display: none">
                        <div id="url-error" style="display: none; color:red">
                        </div>
                        <div id="address-available" style="display: none; color:#BFBFBF">
                        </div>
                        {{-- <div class="c-sub">
                            <input type="text" name="link" autocomplete="off" class="form-control c-input">
                            <span class="text-danger error-text link_err"></span>
                        </div> --}}
                        <div class="c-sub">
                            <input type="text" name="url" autocomplete="off" class="form-control c-input">
                            <div class="error-text url_err"></div>
                        </div>
                    </div>
                    <div class="date-birth">What is your date of birth?</div>
                </div>
            </div>
            <div class="row date">
                <div class="col-md-2 col-sm-2 d1">
                    <select name="month" class="form-control form-select month">
                        <option value="">Month</option>
                        <option value="1">January</option>
                        <option value="2">Feburary</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <div class="error-text month_err"></div>
                </div>
                <div class="col-md-1 col-sm-1 d2">
                    <select name="day" class="form-control form-select day" id="">
                        <option value="">Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <div class="error-text day_err"></div>

                </div>
                <div class="col-md-1 col-sm-1 d3">
                    <select name="year" class="form-control form-select year">
                        <option value="">Year</option>
                        <option value="2011">2011</option>
                        <option data-v-9ec954d0="" value="2010">2010</option>
                        <option data-v-9ec954d0="" value="2009">2009</option>
                        <option data-v-9ec954d0="" value="2008">2008</option>
                        <option data-v-9ec954d0="" value="2007">2007</option>
                        <option data-v-9ec954d0="" value="2006">2006</option>
                        <option data-v-9ec954d0="" value="2005">2005</option>
                        <option data-v-9ec954d0="" value="2004">2004</option>
                        <option data-v-9ec954d0="" value="2003">2003</option>
                        <option data-v-9ec954d0="" value="2002">2002</option>
                        <option data-v-9ec954d0="" value="2001">2001</option>
                        <option data-v-9ec954d0="" value="2000">2000</option>
                        <option data-v-9ec954d0="" value="1999">1999</option>
                        <option data-v-9ec954d0="" value="1998">1998</option>
                        <option data-v-9ec954d0="" value="1997">1997</option>
                        <option data-v-9ec954d0="" value="1996">1996</option>
                        <option data-v-9ec954d0="" value="1995">1995</option>
                        <option data-v-9ec954d0="" value="1994">1994</option>
                        <option data-v-9ec954d0="" value="1993">1993</option>
                        <option data-v-9ec954d0="" value="1992">1992</option>
                        <option data-v-9ec954d0="" value="1991">1991</option>
                        <option data-v-9ec954d0="" value="1990">1990</option>
                        <option data-v-9ec954d0="" value="1989">1989</option>
                        <option data-v-9ec954d0="" value="1988">1988</option>
                        <option data-v-9ec954d0="" value="1987">1987</option>
                        <option data-v-9ec954d0="" value="1986">1986</option>
                        <option data-v-9ec954d0="" value="1985">1985</option>
                        <option data-v-9ec954d0="" value="1984">1984</option>
                        <option data-v-9ec954d0="" value="1983">1983</option>
                        <option data-v-9ec954d0="" value="1982">1982</option>
                        <option data-v-9ec954d0="" value="1981">1981</option>
                        <option data-v-9ec954d0="" value="1980">1980</option>
                        <option data-v-9ec954d0="" value="1979">1979</option>
                        <option data-v-9ec954d0="" value="1978">1978</option>
                        <option data-v-9ec954d0="" value="1977">1977</option>
                        <option data-v-9ec954d0="" value="1976">1976</option>
                        <option data-v-9ec954d0="" value="1975">1975</option>
                        <option data-v-9ec954d0="" value="1974">1974</option>
                        <option data-v-9ec954d0="" value="1973">1973</option>
                        <option data-v-9ec954d0="" value="1972">1972</option>
                        <option data-v-9ec954d0="" value="1971">1971</option>
                        <option data-v-9ec954d0="" value="1970">1970</option>
                        <option data-v-9ec954d0="" value="1969">1969</option>
                        <option data-v-9ec954d0="" value="1968">1968</option>
                        <option data-v-9ec954d0="" value="1967">1967</option>
                        <option data-v-9ec954d0="" value="1966">1966</option>
                        <option data-v-9ec954d0="" value="1965">1965</option>
                        <option data-v-9ec954d0="" value="1964">1964</option>
                        <option data-v-9ec954d0="" value="1963">1963</option>
                        <option data-v-9ec954d0="" value="1962">1962</option>
                        <option data-v-9ec954d0="" value="1961">1961</option>
                        <option data-v-9ec954d0="" value="1960">1960</option>
                        <option data-v-9ec954d0="" value="1959">1959</option>
                        <option data-v-9ec954d0="" value="1958">1958</option>
                        <option data-v-9ec954d0="" value="1957">1957</option>
                        <option data-v-9ec954d0="" value="1956">1956</option>
                        <option data-v-9ec954d0="" value="1955">1955</option>
                        <option data-v-9ec954d0="" value="1954">1954</option>
                        <option data-v-9ec954d0="" value="1953">1953</option>
                        <option data-v-9ec954d0="" value="1952">1952</option>
                        <option data-v-9ec954d0="" value="1951">1951</option>
                        <option data-v-9ec954d0="" value="1950">1950</option>
                        <option data-v-9ec954d0="" value="1949">1949</option>
                        <option data-v-9ec954d0="" value="1948">1948</option>
                        <option data-v-9ec954d0="" value="1947">1947</option>
                        <option data-v-9ec954d0="" value="1946">1946</option>
                        <option data-v-9ec954d0="" value="1945">1945</option>
                        <option data-v-9ec954d0="" value="1944">1944</option>
                        <option data-v-9ec954d0="" value="1943">1943</option>
                        <option data-v-9ec954d0="" value="1942">1942</option>
                        <option data-v-9ec954d0="" value="1941">1941</option>
                        <option data-v-9ec954d0="" value="1940">1940</option>
                        <option data-v-9ec954d0="" value="1939">1939</option>
                        <option data-v-9ec954d0="" value="1938">1938</option>
                        <option data-v-9ec954d0="" value="1937">1937</option>
                        <option data-v-9ec954d0="" value="1936">1936</option>
                        <option data-v-9ec954d0="" value="1935">1935</option>
                        <option data-v-9ec954d0="" value="1934">1934</option>
                        <option data-v-9ec954d0="" value="1933">1933</option>
                        <option data-v-9ec954d0="" value="1932">1932</option>
                        <option data-v-9ec954d0="" value="1931">1931</option>
                        <option data-v-9ec954d0="" value="1930">1930</option>
                        <option data-v-9ec954d0="" value="1929">1929</option>
                        <option data-v-9ec954d0="" value="1928">1928</option>
                        <option data-v-9ec954d0="" value="1927">1927</option>
                        <option data-v-9ec954d0="" value="1926">1926</option>
                        <option data-v-9ec954d0="" value="1925">1925</option>
                        <option data-v-9ec954d0="" value="1924">1924</option>
                        <option data-v-9ec954d0="" value="1923">1923</option>
                        <option data-v-9ec954d0="" value="1922">1922</option>
                        <option data-v-9ec954d0="" value="1921">1921</option>
                        <option data-v-9ec954d0="" value="1920">1920</option>
                        <option data-v-9ec954d0="" value="1919">1919</option>
                        <option data-v-9ec954d0="" value="1918">1918</option>
                        <option data-v-9ec954d0="" value="1917">1917</option>
                        <option data-v-9ec954d0="" value="1916">1916</option>
                        <option data-v-9ec954d0="" value="1915">1915</option>
                        <option data-v-9ec954d0="" value="1914">1914</option>
                        <option data-v-9ec954d0="" value="1913">1913</option>
                        <option data-v-9ec954d0="" value="1912">1912</option>
                        <option data-v-9ec954d0="" value="1911">1911</option>
                        <option data-v-9ec954d0="" value="1910">1910</option>
                        <option data-v-9ec954d0="" value="1909">1909</option>
                        <option data-v-9ec954d0="" value="1908">1908</option>
                        <option data-v-9ec954d0="" value="1907">1907</option>
                        <option data-v-9ec954d0="" value="1906">1906</option>
                        <option data-v-9ec954d0="" value="1905">1905</option>
                        <option data-v-9ec954d0="" value="1904">1904</option>
                        <option data-v-9ec954d0="" value="1903">1903</option>
                        <option data-v-9ec954d0="" value="1902">1902</option>
                        <option data-v-9ec954d0="" value="1901">1901</option>
                        <option data-v-9ec954d0="" value="1900">1900</option>
                    </select>
                    <div class="error-text year_err"></div>
                </div>
            </div>
            <!-- Add error message placeholders -->
            {{-- <span style="color: red">
                @error('month')
                    {{ $message }}
                @enderror
                @error('day')
                    {{ $message }}
                @enderror
                @error('year')
                    {{ $message }}
                @enderror
            </span> --}}
            <div class="row">
                <div class="col-lg-5">
                    <p class="profile-desc">
                        Everpage is available to people 13 years old and
                        older. Your age will not be publicly visible unless
                        you choose otherwise.</p>
                </div>
            </div>
            <button class="btn btn-primary complete-btn" type="submit">Complete account</button>
        </form>
    </div>
    {{ View::make('footer') }}



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

<script>
    $(document).ready(function() {

        $('.c-input').on('input', function() {

            var inputValue = $(this).val().trim();
            console.log(inputValue);

            if (inputValue == '') {

                var url = "The url field is required";
                $('.url_err').html(url).show();
            } else {
                $('.url_err').hide();

            }
        });

        $('.day').on('change', function() {

            var inputValueday = $('.day').val().trim();
            if (inputValueday == '') {
                var day = "The day field is required.";
                $('.day_err').html(day).show();
            } else {
                $('.day_err').hide();
            }
        });

        $('.month').on('change', function() {

            var inputValuemonth = $('.month').val().trim();
            if (inputValuemonth == '') {
                var month = "The month field is required.";
                $('.month_err').html(month).show();
            } else {
                $('.month_err').hide();
            }
        });

        $('.year').on('change', function() {

            var inputValueyear = $('.year').val().trim();
            if (inputValueyear == '') {
                var year = "The year field is required.";
                $('.year_err').html(year).show();
            } else {
                $('.year_err').hide();
            }
        });




        function handleInputValidation() {
            var inputValue = $(".c-input").val().trim();
            console.log(inputValue);

            if (inputValue !== '') {
                $.ajax({
                    url: '{{ route('verified.id', ['id' => session('signin'), session('draft')]) }}',
                    type: 'POST',
                    data: $('#link-form').serialize(),
                    success: function(response) {
                        console.log(response);
                        if (!response.success) {

                            var errors = response.errors;
                            console.log(errors);
                            $('#url-error').hide();
                            $('#address-unavailable').html(errors).show();
                            $('#address-available').hide();
                            $('#tik').hide();
                            $('.complete-btn').prop('disabled', true);

                        } else {
                            var link = response.link;
                            $('#address-unavailable').hide();
                            $('#address-available').html(link).show();
                            $('#tik').show();
                            $('.complete-btn').prop('disabled', false);
                            $('#url-error').hide();
                            printErrorMsg(response.error);


                        }
                    }
                });
            } else {

                var url = "The url field is required";
                $('#url-error').html(url).show();
                $('#address-unavailable').hide();
                $('#address-available').hide();
                $('#tik').hide();
                $('.complete-btn').prop('disabled', true);
            }
        }

        function allInputValidation() {

            $.ajax({
                url: '{{ route('verified.id', ['id' => session('signin'), session('draft')]) }}',
                type: 'POST',
                data: $('#link-form').serialize(),
                success: function(data) {
                    if (!data.success) {

                        printErrorMsg(data.error);
                        $('.url_err').show();

                    } else {
                        // printErrorMsg(data.error).hide();
                        $('.url_err').hide();
                        window.location.href = data.redirect;


                    }
                }
            });

        }

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                console.log(key);
                $('.' + key + '_err').text(value);
            });
        }

        // $(".c-input").on('input', handleInputValidation);

        $('.complete-btn').on('click', function(e) {
            // Call the input validation function
            e.preventDefault();
            allInputValidation();
        });


    });
</script>

</html>
