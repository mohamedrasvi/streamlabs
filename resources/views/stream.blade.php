<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StreamLabs</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/streamer') }}">Add Streamer</a>
                        <a href="{{ url('/logout') }}">Logout</a>
                </div>


            <div class="content">
                <div class="title m-b-md">
                    StreamLabs
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <form class="form-signin" method="POST" action="{{ route('streamer') }}">
                        {{ csrf_field() }}
                        <label for="inputText" class="">streamer</label>
                        <input type="text" id="inputText" class="form-control" name="streamer" placeholder="Twitch user name"
                               required="required" autofocus="">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">submit</button>
                    </form>
                </div>
                <div class="links">
                </div>
            </div>
        </div>
    </body>
</html>
