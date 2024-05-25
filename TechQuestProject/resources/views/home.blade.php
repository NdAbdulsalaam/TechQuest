<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TechQuest Stem Academy</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 28px;
            }
            .top-left {
                position: absolute;
                left: 10px;
                top: 0px;
            }
            .top-left img {
                height: 7rem;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 44px;
                font-weight: bold;
            }
            .time {
                font-size: 200px;
                font-weight: bold;
                color: black;
                font-family: impact;
            }
            .links > a {
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .sign a {
                padding: 20px;
                font-size: 25px;
            }
            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}
            .form-popup {
                display: none;
                position: absolute;
                bottom: 0;
                border: 3px solid #f1f1f1;
                z-index: 29;
            }
            .form-container {
                max-width: 300px;
                padding: 10px;
                background-color: white;
            }
            .form-container input[type=email] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                border: none;
                background: #f1f1f1;
            }
            .form-container input[type=email]:focus {
                background-color: #ddd;
                outline: none;
            }
            .form-container .btn {
                background-color: #04AA6D;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom: 10px;
                opacity: 0.8;
            }
            .form-container .btn2 {
                background-color: #000000;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom: 10px;
                opacity: 0.8;
            }
            .form-container .cancel {
                background-color: red;
            }
            .form-container .btn:hover, .open-button:hover {
                opacity: 1;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <div class="">
                <div class="top-left">
                    <img src="{{ asset('dashboard/img/tq-logo.png') }}" alt="">
                </div>
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ route(auth()->user()->role .'.dashboard') }}" class="btn btn-dark">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-danger">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <div class="form-popup" id="myForm">
                <form method="POST" action="{{ route('attendance.signIn') }}" class="form-container">
                    @csrf
                    @if (session()->has('message'))
                        <p class="alert alert-success text-center">
                            {{ session()->get('message') }}
                        </p>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById("myForm").style.display = "block";
                            });
                        </script>
                    @endif

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById("myForm").style.display = "block";
                            });
                        </script>
                    @endif
                    
                    <label for="email">Email:</label>
                    <input type="email" placeholder="Enter Your Email" name="email" id="email" required>
                    
                    <button type="submit" class="btn">Sign In</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>  
                </form>
            </div>

            <div class="form-popup" id="myForm2">
                <form method="POST" action="{{ route('attendance.signOut') }}" class="form-container">
                    @csrf
                    <label for="email">Email:</label>
                    <input type="email" placeholder="Email" name="email" id="email" required>
                    <button type="submit" class="btn2">Sign Out</button>
                    <button type="button" class="btn2 cancel" onclick="closeForm2()">Close</button>  
                </form>
            </div>

            <div class="content">
                <div class="title m-b-md text-danger">
                    {{ __('TechQuest Stem Academy') }}
                </div>
                <div class="time m-b-md">
                    <div id="clock">&nbsp;</div>
                </div>
                <div class="sign">
                    <a href="#" class="btn btn-danger m-2 open-button" onclick="openForm()">Sign In</a>
                    <a href="#" class="btn btn-dark m-2 open-button" onclick="openForm2()">Sign Out</a>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

    function openForm2() {
        document.getElementById("myForm2").style.display = "block";
    }

    function closeForm2() {
        document.getElementById("myForm2").style.display = "none";
    }

    var d = new Date();

    function updateClock() {
        d.setTime(d.getTime() + 1000);

        var currentHours = d.getHours();
        var currentMinutes = d.getMinutes();
        var currentSeconds = d.getSeconds();

        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

        var timeOfDay = (currentHours < 12) ? "am" : "pm";

        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
        currentHours = (currentHours == 0) ? 12 : currentHours;

        var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

        document.getElementById("clock").firstChild.nodeValue = currentTimeString;
    }

    window.onload = function() {
        updateClock();
        setInterval('updateClock()', 1000);
    }
</script>
