<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StreamLabs</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #19171c;
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
                color: #19171c;
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
                <div class="row">
                    <div class="col-md-3">
                        <h2>Latest top ten videos </h2>
                        @isset($data)
                            @foreach($data as $d)
                                @isset($d->url)
                                <a href="{{$d->url}}"> {{$d->title}} </a><br>
                                @endisset
                            @endforeach
                        @endisset
                    </div>
                    <div class="col-md-9">
                        <div id="twitch-embed"></div>
                    </div>
                </div>


                <!-- Add a placeholder for the Twitch embed -->

                <div class="links">
                </div>
            </div>
        </div>
    </body>
    <!-- Load the Twitch embed script -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>

    <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
    <script type="text/javascript">
        new Twitch.Embed("twitch-embed", {
            width: 854,
            height: 480,
            channel: '{{$name}}',
            chat : 'default',
        });
    </script>
</html>
